@extends('layouts.backend')
@section('content')

<div class="row-fluid sortable">
	<div class="row-fluid sortable">		
				<div class="box span12">
					<div class="box-header" data-original-title>
						<h2><i class="halflings-icon user"></i><span class="break"></span>All Message</h2>
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
								  <th>Photo</th>
								  <th>Name</th>
								  <th>Email</th>
								  <th>Created_At</th>
								  <th>Actions</th>
							  </tr>
						  </thead>   
						  <tbody>
						  @foreach ($message as $messages)
							<tr>
								<td>{{$messages->id}}</td>
								<td><img src="{{$messages->image}}" alt="{{$messages->name}}"></td>
								<td class="center" valign="middle">{{$messages->name}}</td>
								<td class="center">{{$messages->email}}</td>
								<td class="center">{{Carbon\Carbon::createFromFormat('Y-m-d H:i:s', $messages->created_at)->format('Y-m-d')}}</td>
								<td class="center">
									<a class="btn btn-success" href="{{ route('viewsms', ['id' => $messages->id]) }}">
										<i class="halflings-icon white zoom-in"></i>  
									</a>
									<a href="" class="btn btn-info btn-xs">Reply</a>
								</td>
							</tr>
						  @endforeach
						  </tbody>
					  </table>            
					</div>
				</div><!--/span-->
			
			</div>
</div>

@endsection