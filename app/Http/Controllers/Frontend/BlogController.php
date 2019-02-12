<?php

namespace App\Http\Controllers\Frontend;

use Illuminate\Http\Request;
use App\Http\Requests;
use App\Http\Controllers\Controller;
use App\Category;
use App\Tag;
use App\Blog;
use App\Blog_tag;
use App\Message;
use App\Subscribe;
use DB;
use Session;
use Purifier;
use Image;
use Cache;
use View;
class BlogController extends Controller
{
    function __construct()
  {
      $this->sidebar();
  }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {   
        $posts = Blog::where('status', 1)->orderBy('created_at', 'desc')->paginate(6);
        return view('fontend.home',[
           'siteTitle'=>'Home Page'])->withPosts($posts);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $post = Blog::find($id);
        $post->view+=1;
        $post->save();
        return view('fontend.singlepost', [
           'siteTitle'=>$post->title,
           'siteImage'=>$post->image,
           'siteContents'=>$post->post
           ])->withPost($post);
    }


    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function getCategory($category)
    {
        $category=Category::where('name', $category)->firstOrFail();
        $blog=Blog::where('category_id', $category->id)->Where('status',1)->orderBy('created_at', 'desc')->paginate(6);
        

        return view('fontend.blog', [
            'siteTitle'=> $category->name
            ])->withBlog($blog);
    }


    public function getTag($tag)
    {
        $tag=Tag::where('id', $tag)->orWhere('name', $tag)->firstOrFail();
        $blog=Tag::find($tag->id)->blogs()->where('blogs.status', 1)->orderBy('created_at', 'desc')->paginate(6);

        return view('fontend.blog', [
            'siteTitle'=> $tag->name
        ])->withBlog($blog);
    }

    public function search(Request $req)
    {
        $query = rawurldecode($req->input('s'));
        $words = explode(' ', $query);
        $skipKeywords = ['in', 'are', 'of', 'at', 'a', 'is', 'to', 'an', 'for', 'and', 'or', 'with'];
        $tags = [];

        $keywords = array_diff($words, $skipKeywords);

        $blog = Blog::with('tag')->where(function($s) use($keywords) {
            foreach($keywords as $tag) {
                $s->orWhere('blogs.title', 'like', '%'.$tag.'%');
            }
        })->where('blogs.status', 1)->orderBy('title', 'asc')->paginate(10);

        return view('fontend.blog', [
            'siteTitle'=> 'Search - '. $query
        ])->withBlog($blog);
    }

    public function contact()
    {
        return view('fontend.contact', [
            'siteTitle' => 'Contact'
            ]);
    }

    public function messageStore(Request $request)
    {
        $this->validate($request,array(
            'name' => 'required',
            'email' => 'required | email',
            'message' => 'required'
            ));

        $message = new Message;
        $message ->name = $request->name;
        $message ->email = $request->email;
        $message ->image = $request->email;
        $message ->message = $request->message;
        $message->status = 0;
        View::share ( 'names', $request->name );
        $message->save();
        
        Session::flash('success', 'Message Sent Successfully');
        return redirect()->route('contact');
    }


    //subscribe 
    public function subscribe(Request $request)
    {
        $this->validate($request,array(
            'email' => 'required|unique:subscribe|email',
            ));
        $subscribe = new Subscribe;
        $subscribe ->email = $request->email;
        $subscribe ->image = $request->email;

        $subscribe->save();
        Session::flash('success', 'Subscribe Successfully');
        return redirect()->route('homes');
    }

    //about page
    public function about()
    {
        return view('fontend.about', [
            'siteTitle' => 'About',
            'siteContents' => 'Hi! My Name is Tanbir I am a Running B.sc in CSE Student, open source enthusiast, fast learner, early adopter, self motivated and i am from a beautiful country, Bangladesh.'
            ]);
    }
    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }

    protected function sidebar()
    {   
        if(!Cache::has('_category')){
            $category=Category::get();
            Cache::put('_category', $category, 60);
        }
       
        if(!Cache::has('_tag')){
            $tags=Blog_tag::join('tag', 'blog_tag.tag_id','=', 'tag.id')->select('tag.id', DB::raw('count(tag_id) as total_tags'), 'tag.name')->groupBy('blog_tag.tag_id')->take(20)->get();
            Cache::put('_tag', $tags, 60);
        }

        if(!Cache::has('_recent')){
            $recent=Blog::where('status', 1)->orderBy('created_at','desc')->take(5)->get();
            Cache::put('_recent', $recent, 60);
        }

        if(!Cache::has('_popular')){
            $popular=Blog::where('status', 1)->orderBy('view', 'desc')->take(5)->get();
            Cache::put('_popular', $popular, 60);
        }

        view()->composer('*', function($view){
                $view->with('SiteData', [
                    'category'=>Cache::get('_category'),
                    'tag'=>Cache::get('_tag'),
                    'blog'=>Cache::get('_recent'),
                    'popular'=>Cache::get('_popular')
                    ]);
            });
    }
}
