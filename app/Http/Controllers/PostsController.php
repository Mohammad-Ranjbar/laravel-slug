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

        $slug = str_slug($request->title);

//        $index = 1;
//        while(Post::whereSlug($post->slug)->exists()){
//
//            $post->slug = str_slug($request->title).'-'.$index++;
//        }

        $count = Post::whereRaw("slug RLIKE '^{$slug}(-[0-9]*)?$'")->count();


//        if ($count){
//
//            $post->slug = "{$slug}-{$count}";
//
//        }
//
//        $post->slug = $slug;

        $post->slug = $count ? "{$slug}-{$count}" : $slug;

        $post->save();

        return $post;
    }


}
