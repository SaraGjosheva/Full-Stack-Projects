<?php

namespace App\Http\Controllers;

use ImageKit\ImageKit;
use App\Models\Comment;
use App\Models\Category;
use App\Models\Discussion;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class DiscussionController extends Controller
{
    // public function index()
    // {
    //     $discussions = Discussion::latest()->paginate(10); // or ->get()
    //     return view('discussion.index', compact('discussions'));
    // }

    public function create()
    {
        $categories = Category::all();

        return view('discussions.newDiscussion', compact('categories'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'title' => 'required|string|max:255',
            'description' => 'required|string',
            'category' => 'required|exists:categories,id',
            'image' => 'nullable|image|max:2048', // validate if an image was uploaded
        ]);

        $discussion = new Discussion();
        $discussion->title = $request->title;

        if ($request->hasFile('image')) {
            $image = $request->file('image');

            $imageKit = new ImageKit(
                env('IMAGEKIT_PUBLIC_KEY'),
                env('IMAGEKIT_PRIVATE_KEY'),
                env('IMAGEKIT_URL_ENDPOINT')
            );

            $fileType = $image->getMimeType();
            $fileContent = base64_encode(file_get_contents($image->getRealPath()));

            $file = $imageKit->uploadFile([
                'file' => 'data:' . $fileType . ';base64,' . $fileContent,
                'fileName' => 'discussion_picture',
            ]);

            $discussion->img = $file->result->url;
        } else {
            $discussion->img = null; // or default image
        }

        $discussion->description = $request->description;
        $discussion->category_id = $request->category;
        $discussion->user_id = Auth::id();
        $discussion->save();

        $user = Auth::user();

        if ($user->role_id === 1) {
            return redirect()->route('admin.index')->with('message', 'Discussion successfully created! It needs to be approved before you dig into it though!');
        } else {
            return redirect()->route('index')->with('message', 'Discussion successfully created! It needs to be approved before you dig into it though!');
        }
    }

    public function show(string $id)
    {
        $discussion =  Discussion::with(['category', 'user'])->where('id', $id)->get();
        $data = $discussion[0];
        $comments = Comment::with(['discussion', 'user'])->where('discussion_id', $id)->get();
        return view('discussions.showDiscussion', compact('data', 'comments'));
    }

    public function edit(Discussion $discussion)
    {
        $categories = Category::all();

        return view('discussions.editDiscussion', compact('discussion', 'categories'));
    }

    public function update(Request $request, Discussion $discussion)
    {

        $request->validate([
            'title' => 'required|string|max:255',
            'description' => 'required|string',
            'category' => 'required|exists:categories,id',
            'image' => 'nullable|image|max:2048',
        ]);

        $discussion->title = $request->title;

        if ($request->hasFile('image')) {
            $image = $request->file('image');

            $imageKit = new ImageKit(
                env('IMAGEKIT_PUBLIC_KEY'),
                env('IMAGEKIT_PRIVATE_KEY'),
                env('IMAGEKIT_URL_ENDPOINT')
            );

            $fileType = $image->getMimeType();
            $fileContent = base64_encode(file_get_contents($image->getRealPath()));

            $file = $imageKit->uploadFile([
                'file' => 'data:' . $fileType . ';base64,' . $fileContent,
                'fileName' => 'discussion_picture',
            ]);

            $discussion->img = $file->result->url;
        }

        $discussion->description = $request->description;
        $discussion->category_id = $request->category;
        $discussion->update();

        return redirect()->route('admin.approve')->with('update', 'Your Discussion was successfully updated!');
    }

    public function destroy($id)
    {
        $discussion = Discussion::findOrFail($id);
        $user = Auth::user();

        if (!$user || ($user->id !== $discussion->user_id && $user->role_id !== 1)) {
            abort(403);
        }

        $discussion->delete();

        return redirect()->route('admin.index')->with('delete', 'Discussion deleted successfully.');
    }
}
