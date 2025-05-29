<?php

namespace App\Http\Controllers;

use App\Models\Comment;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class CommentsController extends Controller
{
    public function create($id)
    {
        return view('comments.addComment', compact('id'));
    }

    public function store(Request $request, $id)
    {
        $comment = new Comment();
        $comment->user_id = Auth::id();
        $comment->discussion_id = $id;
        $comment->comment = $request->comment;
        $comment->save();
        return redirect()->route('discussion.show', $comment->discussion_id)->with('message', 'Your Comment successfully was created!');
    }

    public function edit(Comment $comment)
    {
        return view('comments.editComment', compact('comment'));
    }

    public function update(Request $request, Comment $comment)
    {
        $comment->comment = $request->comment;
        $comment->update();
        return redirect()->route('discussion.show', $comment->discussion_id)->with('update', 'Your Comment successfully was updated!');
    }

    public function destroy(Comment $comment)
    {
        $comment->delete();
        return redirect()->route('discussion.show', $comment->discussion_id)->with('delete', 'Your Comment successfully was deleted!');
    }
}
