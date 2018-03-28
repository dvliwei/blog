<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class BlogController extends Controller
{
    public function showPost($slug){
        $post = Post::whereSlug($slug)->firstOrFail();
        Event::fire(new BlogView($post));
        return view('home.blog.content')->withPost($post);
    }
}
