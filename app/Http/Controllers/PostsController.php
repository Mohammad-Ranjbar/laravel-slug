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
        /* slug with regular expression

//        $index = 1;//N+1 problem
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

//        $post->slug = $count ? "{$slug}-{$count}" : $slug;
*/
       $latestSlug = Post::whereRaw("slug RLIKE '^{$post->slug}(-[0-9]*)?$'")

                    ->orderBy('id')
                    ->pluck('slug');

        if ($latestSlug){

            $pieces = explode('-',$latestSlug);
            $number = intval(end($pieces));
            $post->slug .='-'.($number+1);

        }

        $post->save();
//$post->makeSlug($request);
        return $post;
    }


}
