<!DOCTYPE html>
<html lang="en">
<head>
	
	<!-- start: Meta -->
	<meta charset="utf-8">
	<title>Admin | tanbir.im</title>
	<meta name="description" content="Bootstrap Metro Dashboard">
	<meta name="author" content="Dennis Ji">
	<meta name="keyword" content="Metro, Metro UI, Dashboard, Bootstrap, Admin, Template, Theme, Responsive, Fluid, Retina">
	<!-- end: Meta -->
	
	<!-- start: Mobile Specific -->
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<!-- end: Mobile Specific -->
	
	<!-- start: CSS -->
	<link id="bootstrap-style" href="{{ url('backend/css/bootstrap.min.css')}}" rel="stylesheet">
	<link href="{{ url('backend/css/bootstrap-responsive.min.css')}}" rel="stylesheet">
	<link id="base-style" href="{{ url('backend/css/style.css')}}" rel="stylesheet">
	<link id="base-style-responsive" href="{{ url('backend/css/style-responsive.css')}}" rel="stylesheet">
	<link href='http://fonts.googleapis.com/css?family=Open+Sans:300italic,400italic,600italic,700italic,800italic,400,300,600,700,800&subset=latin,cyrillic-ext,latin-ext' rel='stylesheet' type='text/css'>
	<!-- end: CSS -->
	<link href='https://fonts.googleapis.com/css?family=Pacifico|Open+Sans:400,300,700' rel='stylesheet' type='text/css'>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/meyer-reset/2.0/reset.min.css">

  <link rel='stylesheet' href='https://cdnjs.cloudflare.com/ajax/libs/sweetalert/1.1.3/sweetalert.min.css'>
	  <script src='http://cdnjs.cloudflare.com/ajax/libs/jquery/2.1.3/jquery.min.js'></script>
<script src='https://cdnjs.cloudflare.com/ajax/libs/sweetalert/1.1.3/sweetalert.min.js'></script>



	<link rel="shortcut icon" href="img/favicon.ico">
	<!-- end: Favicon -->
	@yield('stylesheets')
		
		
		
</head>

<body>
		<!-- start: Header -->
	<div class="navbar">
		<div class="navbar-inner">
			<div class="container-fluid">
				<a class="btn btn-navbar" data-toggle="collapse" data-target=".top-nav.nav-collapse,.sidebar-nav.nav-collapse">
					<span class="icon-bar"></span>
					<span class="icon-bar"></span>
					<span class="icon-bar"></span>
				</a>
				<a class="brand" href="{{route('home')}}"><span>Tanbir.im</span></a>
								
				<!-- start: Header Menu -->
				<div class="nav-no-collapse header-nav">
					<ul class="nav pull-right">

						<!-- start: Message Dropdown -->
						<li class="dropdown hidden-phone">
							<a class="btn dropdown-toggle" data-toggle="dropdown" href="#">
								<i class="halflings-icon white envelope"></i>
								<span style="border-radius: 10px;
    margin-left: -6px;" class="label label-important"> {{ count($SmsData['messages']) }} </span>
							</a>
							<ul class="dropdown-menu messages">
								<li class="dropdown-menu-title">
 									<span>You have {{ count($SmsData['messages']) }} messages</span>
									<a href="#refresh"><i class="icon-repeat"></i></a>
								</li>
								@foreach($SmsData['messages'] as $sms)	
                            	<li>
                                    <a href="{{ route('viewsms', ['id' => $sms->id]) }}">
										<span class="avatar"><img src="{{$sms->image}}" alt="{{$sms->name}}"></span>
										<span class="header">
											<span class="from">
										    	{{$sms->name}}
										     </span>
											<span class="time">
										    	{{$sms->created_at}}
										    </span>
										</span>
                                        <span class="message">
                                           {{$sms->message}}
                                        </span>  
                                    </a>
                                </li>
                     			@endforeach
								<li>
                            		<a href="{{route('messages')}}" class="dropdown-menu-sub-footer">View all messages</a>
								</li>	
							</ul>
						</li>
						<!-- start: User Dropdown -->
						<li class="dropdown">
							<a class="btn dropdown-toggle" data-toggle="dropdown" href="#">
								<i class="halflings-icon white user"></i>{{ Auth::user()->name }}
								<span class="caret"></span>
							</a>
							<ul class="dropdown-menu">
								<li class="dropdown-menu-title">
 									<span>Account Settings</span>
								</li>
								<li><a href="{{ route('logout') }}"
                                       onclick="event.preventDefault();
                                                     document.getElementById('logout-form').submit();"><i class="halflings-icon off"></i>{{ __('Logout') }}</a><form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                                        @csrf
                                    </form></li>
							</ul>
						</li>
						<!-- end: User Dropdown -->
					</ul>
				</div>
				<!-- end: Header Menu -->
				
			</div>
		</div>
	</div>
	<!-- start: Header -->
	
		<div class="container-fluid-full">
		<div class="row-fluid">
				
			<!-- start: Main Menu -->
			<div id="sidebar-left" class="span2">
				<div class="nav-collapse sidebar-nav">
					<ul class="nav nav-tabs nav-stacked main-menu">
						<li><a href="{{route('category')}}"><i class="icon-edit"></i><span class="hidden-tablet"> Category</span></a></li>
						<li><a href="{{route('tag')}}"><i class="icon-tags"></i><span class="hidden-tablet"> Tags</span></a></li>
						<li>
							<a class="dropmenu" href="#"><i class="icon-folder-close-alt"></i><span class="hidden-tablet"> Posts</span><span class="label label-important"> 2 </span></a>
							<ul>
								<li><a class="submenu" href="{{route('addpost')}}"><i class="icon-file-alt"></i><span class="hidden-tablet"> Add Post</span></a></li>
								<li><a class="submenu" href="{{route('allpost')}}"><i class="icon-file-alt"></i><span class="hidden-tablet"> All Post</span></a></li>
							</ul>	
						</li>
						<li><a href="{{ route('messages') }}"><i class="icon-envelope-alt"></i><span class="hidden-tablet"> Message</span></a></li>
						<li><a href="{{ route('subscribe') }}"><i class="icon-plane"></i><span class="hidden-tablet"> Subscribe</span></a></li>
					</ul>
				</div>
			</div>
			<!-- end: Main Menu -->
			<div id="content" class="span10">
			@include('partials.message')
