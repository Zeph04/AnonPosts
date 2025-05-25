<?php

namespace App\Http\Controllers;

use App\Models\Post;
use Illuminate\Http\Request;

class PostController extends Controller
{
    public function index()
    {
        $posts = Post::where('status', 'accepted')->latest()->get();
        return view('posts.index', compact('posts')); // updated path
    }

    public function create()
    {
        return view('posts.create'); // updated path
    }

    public function store(Request $request)
    {
        $request->validate([
            'content' => 'required'
        ]);

        Post::create([
            'content' => $request->content,
            'user_id' => auth()->id(),
        ]);

        return redirect('/')->with('success', 'Post submitted!');
    }
}
