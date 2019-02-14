@extends('layouts.fontend')

@section('content')

<!-- Main Content -->
        <div id="colorlib-container">
      <div class="container">
        <div class="row">
          <div class="content">
     
            <article class="blog-entry">
              <div class="blog-wrap">
                <h2 class="text-center"><a href="">{{$post->title}}</a></h2>
                <div class="blog-image">
                  <a href="#" class="blog-img text-center" style="background-image: url(/images/{{$post->image}});"><span></span></a>
                </div>
                <span class="category text-center"><a href="blog.html"><i class="icon-calendar3"></i>{{Carbon\Carbon::createFromFormat('Y-m-d H:i:s', $post->created_at)->format('Y-m-d')}}</a> | <a href="blog.html" class="posted-by"><i class="icon-earth"></i> {{$post->category->name}}</a> | <a href="blog.html"><i class="icon-eye"></i> {{$post->view}}</a></span>
                
              </div>
              <div class="desc">
             {!!$post->post!!}
              </div>

<span class="category text-center">@foreach($post->tag as $tag)<a style="border: 1px solid #cccccc;
color: gray;
padding: 5px 12px;
font-size: 10px;
border-radius: 4px;
background: #dadada;
" href="{{ route('tagpost', ['tag' => $tag->name]) }}">{{$tag->name}}</a> @endforeach</span>

              </article>

              <!-- share buttons -->
              <div class="share-buttons" style="margin-top:50px; text-align:center;">
              <h4>Share this post</h4>
              <!-- Facebook -->
              <a href="https://www.facebook.com/sharer/sharer.php?u={{Request::url()}}" title="Share on Facebook" target="_blank" class="btn btn-facebook social-btn"><i class="fab fa-facebook-f"></i> Facebook</a>
              <!-- Twitter -->
              <a href="http://twitter.com/home?status={{Request::url()}}" title="Share on Twitter" target="_blank" class="btn btn-twitter social-btn"><i class="fab fa-twitter"></i> Twitter</a>
              <!-- Google+ -->
              <a href="https://plus.google.com/share?url={{Request::url()}}" title="Share on Google+" target="_blank" class="btn btn-googleplus social-btn"><i class="fab fa-google-plus-g"></i> Google+</a>
              </div>

              <!-- start comment box -->

                //facebook comment plugin add

              <!-- end comment box -->
    </div>
@endsection
