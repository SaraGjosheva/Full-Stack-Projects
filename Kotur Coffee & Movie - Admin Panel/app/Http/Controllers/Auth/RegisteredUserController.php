<?php

namespace App\Http\Controllers\Auth;

use App\Models\User;
use Illuminate\View\View;
use Illuminate\Http\Request;
use Illuminate\Validation\Rule;
use Illuminate\Validation\Rules;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Http\RedirectResponse;
use Illuminate\Auth\Events\Registered;

class RegisteredUserController extends Controller
{
    public function create(): View
    {
        return view('auth.register');
    }

    public function store(Request $request): RedirectResponse
    {
        $hasSuperAdmin = User::where('role', 'super-admin')->exists();

        if ($hasSuperAdmin && (!Auth::check() || Auth::user()->role !== 'super-admin')) {
            return redirect()->back()->withErrors(['access' => 'Само Супер-Админ може да регистрира нови корисници/админи.']);
        }

        $roleRules = $hasSuperAdmin
            ? ['required', Rule::in(['admin'])]
            : ['required', Rule::in(['super-admin'])];

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
            'role' => $roleRules,
        ]);

        $user = User::create([
            'name' => $request->name,
            'email' => $request->email,
            'password' => Hash::make($request->password),
            'role' => $request->role,
        ]);

        event(new Registered($user));

        Auth::login($user);

        // Success message varies by role
        if ($request->role === 'super-admin') {
            $message = 'Прв Супер-Админ е успешно регистриран!';
        } else {
            $message = 'Админ е успешно регистриран!';
        }

        return redirect()->route('dashboard')->with('success', $message);
    }
}
