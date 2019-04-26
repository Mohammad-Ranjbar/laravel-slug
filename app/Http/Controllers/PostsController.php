<?php

namespace App\Http\Controllers;

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

    public function store(Request $request)
    {
        $post = new Post;

        $post->title = $request->title;
        $post->body = $request->body;

        $post->slug = str_slug($request->title);

        $index = 1;
        while(Post::whereSlug($post->slug)->exists()){

            $post->slug = str_slug($request->title).'-'.$index++;

        }

        $post->save();

        return $post;
    }


}
