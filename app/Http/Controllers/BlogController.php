<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use BlogService;
class BlogController extends Controller
{
    public function showPost($slug){
        $post = Post::whereSlug($slug)->firstOrFail();
        Event::fire(new BlogView($post));
        return view('home.blog.content')->withPost($post);
    }

    public function index(){
        $items = BlogService::findAll();
        $items = BlogService::findAllByAttributes(['id'=>1,'title'=>'轻轻和编程']);
        $items = BlogService::findAllWithPage(3);
        return view('blog.index', ['items' => $items]);
    }
}
