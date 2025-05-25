<?php

namespace App\Http\Controllers;

use App\Models\Post;
use Illuminate\Http\Request;

class AdminController extends Controller
{
    public function index() {
        $posts = Post::where('status', 'pending')->get();
        return view('admin.index', compact('posts'));
    }

    public function accept(Post $post) {
        logger('Accept called for post id: ' . $post->id);
        $post->update(['status' => 'accepted']);
        return back();
    }

    public function decline(Post $post) {
        logger('Decline called for post id: ' . $post->id);
        $post->update(['status' => 'declined']);
        return back();
    }
}
