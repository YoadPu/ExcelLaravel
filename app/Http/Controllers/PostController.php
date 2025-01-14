<?php

namespace App\Http\Controllers;

use App\Models\Post;

class PostController extends Controller
{
    public function index()
    {                
        return view('posts', [
            "title" => "All Posts",
            "active" => 'posts',
            "posts" => Post::latest()->filter(request(['search', 'category']))->get()
        ]);
    }

    public function show(Post $post)
    {
        return view('post', [
            "title" => "Singel Post",
            "active" => 'posts',
            "post" => $post
        ]);
    }
}
