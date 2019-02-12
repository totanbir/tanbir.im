<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Blog;
use App\Category;
use App\Tag;
use App\Subscribe;
use Cache;
class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $posts = Blog::all();
        $categories = Category::all();
        $tag = Tag::all();
        $subscribe = Subscribe::all();
        return view('backend.index')->withPosts($posts)->withCategories($categories)->withTag($tag)->withSubscribe($subscribe);
    }
}
