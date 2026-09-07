<?php

namespace App\Http\Controllers;

use App\Models\Post;
use App\Models\Card;
use App\Models\Comment;
use Illuminate\Http\Request;

class PostCommentsController extends Controller
{
    public function store(Request $request, Post $post)
    {
        $request->validate([
            'body' => 'required|string|max:1000'
        ]);

          $comment = Comment::create([
        'post_id' => $post->id,
        'user_id' => auth()->id(),
        'body' => $request->body,
    ]);

    return response()->json([
        'success' => true,
        'comment' => [
            'body' => $comment->body,
            'author_name' => auth()->user()->name,
            'created_at' => $comment->created_at->diffForHumans(),
        ],
    ]);
        

        // return redirect()->back()->with('success' , 'comment posted');
    }
    public function index(Post $post){
           $comments = Comment::with('author')->latest()->get();
           return view('components.more-data',compact('comments'));
           
    }
}
