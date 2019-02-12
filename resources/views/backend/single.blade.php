@extends('layouts.backend')
@section('content')

<div class="row-fluid sortable">
				<div class="box span12">
					<div class="box-header">
						<h2><i class=""></i><span class="break"></span>Single Posts</h2>
					</div>
					<div class="box-content">
						  <div class="page-header">
							  <h1>{{$post->title}}</h1>
						  </div>     
						  <div class="row-fluid">            
							<img src="{{asset('/images/' . $post->image)}}" width="100%" height="40%">
						  </div><!--/row -->                           
						<hr>
						  <div class="row-fluid">
							  <p>{!!$post->post!!}</p>
						  </div>
						  <div class="row-fluid">
								<div class="span8">
								<h5>Category: {{$post->category->name}}</h5> <h4>Tag: @foreach ($post->tag as $tags)
								<span class="label label-default">{{ $tags->name }}</span>
								@endforeach</h4>
								<h4>Slug: <a href="{{ route('singles', $post->slug) }}">{{ route('singles', $post->slug) }}</a></h4>
								<h4>Created_at: {{$post->created_at}}</h4>
								<h4>Updated_at: {{$post->updated_at}}</h4>
								</div>
						  </div>
							 
					  </div>
				</div><!--/span-->
				
				
			</div>

@endsection