<?php

namespace App\Http\Controllers;

use App\Models\Comment;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth; 

class CommentController extends Controller
{
  
    public function index()
    {
        $comments = Comment::with('user')->latest()->get();
        return view('menu.comment', compact('comments'));
    }

  
    public function create()
    {
        return view('comments.create');
    }

   
    public function store(Request $request)
    {
        $request->validate([
            'content' => 'required|string|max:500',
        ]);
    
        Comment::create([
            'user_id' => Auth::id(),
            'content' => $request->input('content'),
        ]);
    
        return redirect()->route('menu.comment')->with('success', 'Comment successfully added.');
    }

  
    public function edit($id)
    {
        $comment = Comment::findOrFail($id);
        return view('admin.comments.edit', compact('comment'));
    }

   
    public function update(Request $request, $id)
    {
        $comment = Comment::findOrFail($id);

        $request->validate([
            'content' => 'required|string|max:500',
        ]);

        $comment->update([
            'content' => $request->input('content'),
        ]);

        return redirect()->route('admin.comments.index')->with('success', 'Comment successfully updated.');
    }


   
    public function destroy($id)
    {
        $comment = Comment::findOrFail($id);
        $comment->delete();

        return redirect()->route('admin.comments.index')->with('success', 'Comment deleted successfully.');
    }
}
