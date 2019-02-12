@extends('layouts.fontend')

@section('content')

<!-- Main Content -->
        <div id="colorlib-container">
      <div class="container">
        <div class="row">
          <div class="content">
            @foreach($blog as $category)
            <article class="blog-entry">
              <div class="blog-wrap">
                <h2 class="text-center"><a href="{{ route('singlepost', ['id' => $category->id,'slug' => $category->slug]) }}">{{$category->title}}</a></h2>
                <div class="blog-image">
                  <a href="{{ route('singlepost', ['id' => $category->id,'slug' => $category->slug]) }}" class="blog-img text-center" style="background-image: url(/images/{{$category->image}});"><span></span></a>
                  
                </div>
                <span class="category text-center"><a href="#"><i class="icon-calendar3"></i>{{Carbon\Carbon::createFromFormat('Y-m-d H:i:s', $category->created_at)->format('Y-m-d')}}</a> | <a href="#" class="posted-by"><i class="icon-earth"></i> {{$category->category->name}}</a> | <a href="blog.html"><i class="icon-eye"></i> {{$category->view}}</a></span>
              </div>
              <div class="desc">
             {!!strShorten($category->post, 500)!!}
              </div>
              <p class="text-center"><a href="{{ route('singlepost', ['id' => $category->id,'slug' => $category->slug]) }}" class="btn btn-primary btn-custom">Continue Reading</a></p>
            </article>

            @endforeach
            @if(count($blog)<1)
            <p> Sorry, but nothing matched your search terms. Please try again with some different keywords.</p>
            @endif
            
            <div class="row">
              <div class="col-md-12 text-center">
                <ul class="pagination">
                  @if($blog->previousPageUrl())

                <h3><a class="next page-numbers" href="{{$blog->previousPageUrl()}}"><< Previous</a></h3>

                @endif

                @if($blog->hasMorePages())

                <h3><a class="next page-numbers" href="{{$blog->nextPageUrl()}}">Next >></a></h3>

                @endif
                </ul>
              </div>
            </div>
          </div>

@endsection