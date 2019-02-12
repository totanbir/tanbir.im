@extends('layouts.fontend')

@section('content')

    <!-- Main Content -->
        <div id="colorlib-container">
      <div class="container">
        <div class="row">
          <div class="content">
            @foreach($posts as $post)
            <article class="blog-entry">
              <div class="blog-wrap">
                <h2 class="text-center"><a href="{{ route('singlepost', ['id' => $post->id,'slug' => $post->slug]) }}">{{$post->title}}</a></h2>
                <div class="blog-image">
                  <a href="{{ route('singlepost', ['id' => $post->id,'slug' => $post->slug]) }}" class="blog-img text-center" style="background-image: url(images/{{$post->image}});"><span></span></a>
                  
                </div>
                <span class="category text-center"><a href="#"><i class="icon-calendar3"></i>{{Carbon\Carbon::createFromFormat('Y-m-d H:i:s', $post->created_at)->format('Y-m-d')}}</a> | <a href="{{ route('categorypost', ['category' => $post->category->name]) }}" class="posted-by"><i class="icon-earth"></i> {{$post->category->name}}</a> | <a href="blog.html"><i class="icon-eye"></i> {{$post->view}}</a></span>
              </div>
              <div class="desc">
             {!!strShorten($post->post, 500)!!}
              </div>
              <p class="text-center"><a href="{{ route('singlepost', ['id' => $post->id,'slug' => $post->slug]) }}" class="btn btn-primary btn-custom">Continue Reading</a></p>
            </article>
            @endforeach
            <div class="row">
              <div class="col-md-12 text-center">
                <ul class="pagination">
                @if($posts->previousPageUrl())

                <h3><a class="next page-numbers" href="{{$posts->previousPageUrl()}}"><< Previous</a></h3>

                @endif

                @if($posts->hasMorePages())

                <h3><a class="next page-numbers" href="{{$posts->nextPageUrl()}}">Next >></a></h3>

                @endif
                </ul>
              </div>
            </div>
          </div>
@endsection