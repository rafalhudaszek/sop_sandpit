<?php

namespace App\Http\Controllers;

use App\Models\Post;
use Illuminate\Http\Request;

class XSSController extends Controller
{
    public function index()
    {
        return view('XSS');
    }

    public function store(Request $request)
    {
        $post = new Post;
        $post->title = $request->title;
        $post->description = $request->description;
        $post->save();
        return redirect('XSS')->with('status', 'Blog Post Form Data Has Been inserted');
    }

    public function showWithSpecialChars()
    {
        $posts = Post::all();
        return view('XSS-with-special-chars', compact('posts'));
    }

    public function showWithoutSpecialChars()
    {
        $posts = Post::all();
        return view('XSS-without-special-chars', compact('posts'));
    }
}
