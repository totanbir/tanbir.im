<?php

namespace App\Http\Controllers\Backend;

use Illuminate\Http\Request;
use App\Http\Requests;
use App\Http\Controllers\Controller;
use App\Category;
use App\Tag;
use App\Blog;
use App\Message;
use App\Subscribe;
use Session;
use Purifier;
use Image;
class BlogController extends Controller
{
  
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $posts = Blog::orderBy('id', 'desc')->get();
        return view('backend.allpost')->withPosts($posts);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
         $categories = Category::all();
         $tags = Tag::all();
        return view('backend.post')->withCategories($categories)->withTags($tags);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        
        $this->validate($request,array(
            'title'  => 'required|max:255 ',
            'body'    => 'required',
            'slug'    => 'required|alpha_dash|min:5|max:255|unique:blogs,slug',
            'category_id'  => 'required|integer',
            ));


        // store in the database
        $blog = new Blog;

        $blog->title = $request->title;
        $blog->slug = $request->slug;
        $blog->category_id = $request->category_id;
        $blog->post = $request->body;

        if ($request->published==1) {
            $blog->status = $request->published;
        }
        else{
            $blog->status = 0;
        }

        $blog->view = 0;

        if ($request->hasFile('upload_images')) {
          $image = $request->file('upload_images');
          $filename = time() . '.' . $image->getClientOriginalExtension();
          $location = public_path('images/' . $filename);
          Image::make($image)->resize(800, 400)->save($location);

          $blog->image = $filename;
        }

        $blog->save();

        $blog->tag()->sync($request->tag_id, false);

        Session::flash('success', 'The blog post was successfully save!');

        return redirect()->route('addpost');
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
        return view('backend.single')->withPost($post);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $post = Blog::find($id);
        $categories = Category::all();
        $tags = Tag::all();
        return view('backend.edit')->withPost($post)->withCategories($categories)->withTags($tags);
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
        $blog = Blog::find($id);

        if ($request->input('slug') == $blog->slug) {
            $this->validate($request, array(
                'title' => 'required|max:255',
                'category_id' => 'required|integer',
                'body'  => 'required'
            ));
        } else {
        $this->validate($request, array(
                'title' => 'required|max:255',
                'slug'  => 'required|alpha_dash|min:5|max:255|unique:blogs,slug',
                'category_id' => 'required|integer',
                'body'  => 'required'
            ));
        }
        $blog = Blog::find($id);

        $blog->title = $request->input('title');
        $blog->slug = $request->input('slug');
        $blog->category_id = $request->input('category_id');
        $blog->post = $request->input('body');

        if ($request->published==1) {
            $blog->status = $request->published;
        }
        else{
            $blog->status = 0;
        }

        if ($request->hasFile('upload_images')) {
          $image = $request->file('upload_images');
          $filename = time() . '.' . $image->getClientOriginalExtension();
          $location = public_path('images/' . $filename);
          Image::make($image)->resize(800, 400)->save($location);

          $blog->image = $filename;
        }

        $blog->save();

        if (isset($request->tag_id)) {
            $blog->tag()->sync($request->tag_id);
        } else {
            $blog->tag()->sync(array());
        }


        // set flash data with success message
        Session::flash('success', 'This post edit was successfully saved.');

        // redirect with flash data to posts.show
        return redirect()->route('allpost');

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $post = Blog::find($id);
        $post->tag()->detach();

        $post->tag()->detach();

        $post->delete();

        Session::flash('success', 'The post was successfully deleted.');
        return redirect()->route('allpost');
    }

    public function message()

    {
        $message = Message::orderBy('id','DESC')->get();
        return view('backend.message')->withMessage($message);
    }

    public function viewsms($id)
    {
        $messages = Message::find($id);
        $messages->status=1;
        $messages->save();
        return view('backend.viewsms')->withMessages($messages);
    }

    public function subscribe()
    {
        $subscribe = Subscribe::all();
        return view('backend.subscribe')->withSubscribe($subscribe);
    }
}

