<?php

namespace App\Http\Controllers;

use App\Http\Requests\SlugRequest;
use App\Post;
use Illuminate\Http\Request;

class PostsController extends Controller
{
    public function show($slug)
    {

        return Post::whereSlug($slug)->firstOrFail();
    }

    public function create()
    {
        return view('posts.create');
    }

    public function store(SlugRequest $request)
    {
        $post = new Post;

        $post->makeSlug($request);
        return $post;
    }


}
