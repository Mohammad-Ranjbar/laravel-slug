<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Http\Request;

class Post extends Model
{


    public function makeSlug( $request)
    {
        $this->title = $request->title;
        $this->body = $request->body;
        $this->slug = str_slug($request->title);
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
        $latestSlug = Post::whereRaw("slug RLIKE '^{$this->slug}(-[0-9]*)?$'")

            ->orderBy('id')
            ->pluck('slug');

        if ($latestSlug){

            $pieces = explode('-',$latestSlug);
            $number = intval(end($pieces));
            $this->slug .='-'.($number+1);

        }

        $this->save();
    }

}
