@extends('layouts.backend')
@section('content')

<div class="span11 noMarginLeft">
					
					<div class="message dark">
						
						<div class="header">
							<h1>Message Details</h1>
							<div class="from"><i class="halflings-icon user"></i> <b>{{$messages->name}}</b> / {{$messages->email}}  <i class="halflings-icon time"></i>  <b>{{Carbon\Carbon::createFromFormat('Y-m-d H:i:s', $messages->created_at)->format('Y-m-d')}}</b></div>
							<div class="date"><img src="{{$messages->image}}"></div>
							
							<div class="menu"></div>
							
						</div>
						
						<div class="content">
							<p>
								{{$messages->message}}
							</p>	
						</div>

						

@endsection