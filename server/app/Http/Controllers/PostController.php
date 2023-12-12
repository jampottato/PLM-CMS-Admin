<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Post; // Assuming the Post model is in the App\Models namespace

class PostController extends Controller
{
    public function create()
    {
        return view('posts.create');
    }

    public function store(Request $request)
    {
        // Validate the request data
        $validatedData = $request->validate([
            'title' => 'required|max:255',
            'content' => 'required',
        ]);

        // Create a new post
        $post = Post::create($validatedData);

        // Redirect or do something after saving the post
        return redirect()->route('posts.create')->with('success', 'Post created successfully!');
    }
}
