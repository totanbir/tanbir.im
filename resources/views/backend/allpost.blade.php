@extends('layouts.backend')
@section('stylesheets')



@endsection
@section('content')

<div class="row-fluid sortable">		
				<div class="box span12">
					<div class="box-header" data-original-title>
						<h2><i class="halflings-icon user"></i><span class="break"></span>All Posts</h2>
						
						<div class="box-icon">
							<a href="#" class="btn-setting"><i class="halflings-icon wrench"></i></a>
							<a href="#" class="btn-minimize"><i class="halflings-icon chevron-up"></i></a>
							<a href="#" class="btn-close"><i class="halflings-icon remove"></i></a>
						</div>
					</div>
					<div class="box-content">
						<table class="table table-striped table-bordered bootstrap-datatable datatable">
						  <thead>
							  <tr>
								  <th>#</th>
								  <th>Title</th>
								  <th>post</th>
								  <th>Created At</th>
								  <th>Status</th>
								  <th>Actions</th>
							  </tr>
						  </thead>   
						  <tbody>
						 @foreach ($posts as $post)
							<tr>
								<td>{{$post->id}}</td>
								<td class="center">{{$post->title}}</td>
								<td class="center">@php $pieces = 		            explode(" ",$post->post);
                                            $posts = implode(" ", array_splice($pieces, 0,15));
                                            $posts = $posts;
                                            echo $posts; @endphp</td>
								<td class="center">{{Carbon\Carbon::createFromFormat('Y-m-d H:i:s', $post->created_at)->format('Y-m-d')}}</td>
								<td class="center">
								@if($post->active==1)
								<span class="label label-success">Active</span>
								@else
								<span class="label label-important">DeActive</span>
								@endif
								</td>
								<td class="center">
									@if($post->active==1)
									<a class="btn btn-danger" href="">
									<i class="halflings-icon white thumbs-down"></i>  
									</a>
									@else
									<a class="btn btn-success" href="">
									<i class="halflings-icon white thumbs-up"></i>  
									</a>
									@endif
									<a class="btn btn-success" href="{{ route('singles', ['id' => $post->id]) }}">
										<i class="halflings-icon white zoom-in"></i>  
									</a>
									<a class="btn btn-info" href="{{ route('edit', ['id' => $post->id]) }}">
										<i class="halflings-icon white edit"></i>  
									</a>
									<a class="btn btn-danger" id="delete" href="{{ route('deletes', ['id' => $post->id]) }}">
										<i class="halflings-icon white trash"></i> 
									</a>
									</td>
							</tr>
						 @endforeach
						  </tbody>
					  </table>            
					</div>
				</div><!--/span-->
				</div>

@endsection