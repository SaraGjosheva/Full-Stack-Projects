<?php

namespace App\Http\Controllers;

use Rules\Password;
use App\Models\User;
use Illuminate\Support\Str;
use Illuminate\Http\Request;
use Illuminate\Validation\Rule;
use Illuminate\Validation\Rules;
use App\Mail\NewAdminCreatedMail;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Mail;
use Illuminate\Http\RedirectResponse;
use Illuminate\Auth\Events\Registered;

class AdminController extends Controller
{
    public function index()
    {
        $users = User::whereIn('role', ['admin', 'super-admin'])->paginate(10);
        return view('admins.admins', compact('users'));
    }

    public function edit($id)
    {
        $user = User::findOrFail($id);
        return view('admins.edit', compact('user'));
    }

    public function update(Request $request, $id)
    {
        $user = User::findOrFail($id);

        // Validate and update the user's details
        $validated = $request->validate([
            'name'  => [
                'required',
                'string',
                'max:255',
                'regex:/^[\pL\pM\s\-\.]+$/u', // letters, spaces, dashes, dots
            ],
            'email' => [
                'required',
                'string',
                'email:rfc,dns',
                'max:255',
                Rule::unique('users', 'email')->ignore($user->id),
            ],
            'role'  => [
                'required',
                Rule::in(['admin', 'super-admin']),
            ],
        ]);

        if (
            $user->role === 'super-admin' &&
            $validated['role'] === 'admin' &&
            User::where('role', 'super-admin')->count() === 1
        ) {
            return back()
                ->withErrors(['role' => 'Не можете да ја смените улогата на последниот Супер-Админ.'])
                ->withInput();
        }

        $user->update($validated);

        return redirect()
            ->route('admin.users.index')
            ->with('success', 'Админот е успешно изменет!');
    }

    public function create()
    {
        // Optionally, check if the user is a super-admin here for additional security
        return view('admins.register');
    }

    public function store(Request $request): RedirectResponse
    {
        $hasSuperAdmin = User::where('role', 'super-admin')->exists();

        if ($hasSuperAdmin && (!Auth::check() || Auth::user()->role !== 'super-admin')) {
            return redirect()->back()->withErrors(['access' => 'Само Супер-Админ може да регистрира нови корисници/админи.']);
        }

        $request->validate([
            'name' => [
                'required',
                'string',
                'max:255',
                'regex:/^[\\pL\\pM\\s\\-\\.]+$/u' // letters, spaces, dashes, dots
            ],
            'email' => [
                'required',
                'string',
                'lowercase',
                'email:rfc,dns',
                'max:255',
                Rule::unique(User::class),
            ],
            'password' => [
                'required',
                'confirmed',
                Rules\Password::min(12) // at least 12 characters
                    ->mixedCase() // upper & lower
                    ->numbers()   // at least one number
                    ->symbols(),  // at least one special character
            ],
            'role' => [
                'required',
                Rule::in(['admin', 'super-admin']),
            ],
        ]);

        $plainPassword = Str::random(12);

        $user = User::create([
            'name' => $request->name,
            'email' => $request->email,
            'password' => Hash::make($request->password || $plainPassword),
            'role' => $request->role,
        ]);

        Mail::to($user->email)->send(new NewAdminCreatedMail($user, $plainPassword));

        return redirect()->route('admins')->with('success', 'Админот е успешно креиран!');
    }

    public function delete($id)
    {
        $user = User::findOrFail($id);
        return view('admins.delete', compact('user'));
    }

    public function destroy($id)
    {
        if (! Auth::user() || Auth::user()->role !== 'super-admin') {
            abort(403, 'Немате овластување да избришете корисници.');
        }

        $user = User::findOrFail($id);
        $user->delete();

        return redirect()->route('admin.users.index')
            ->with('success', 'Админот е успешно избришан!');
    }
}
