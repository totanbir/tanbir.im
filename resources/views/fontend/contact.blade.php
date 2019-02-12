@extends('layouts.fontend')

@section('content')

<!-- Main Content -->
        <div id="colorlib-container">
      <div class="container">
        <div class="row">
          <div class="content">
            <div class="col-md-10 col-md-offset-1 animate-box">
						<h2>Contact Information</h2>
						<div class="row contact-info-wrap">
							<div class="col-md-5">
								<p><span><i class="icon-location-2"></i></span> Mirpur 2, Dhaka - 1216</p>
							</div>
							<div class="col-md-5">
								<p><span><i class="icon-paperplane"></i></span> tanbir.dns@gmail.com</p>
							</div>
						</div>
					</div>
					<div class="col-md-10 col-md-offset-1 animate-box">
						<h2>Contact form</h2>
					@if (Session::has('success'))

					<div class="alert alert-success" role="alert">
					<strong>Success:</strong> {{ Session::get('success') }}
					</div>

					@endif

					@if (count($errors) > 0)

					<div class="alert alert-danger" role="alert">
					<strong>Errors:</strong>
					<ul>
					@foreach ($errors->all() as $error)
					<li>{{ $error }}</li>
					@endforeach  
					</ul>
					</div>

					@endif
						<form action="{{route('message')}}" method="post">
						@csrf
							<div class="row form-group">
								<div class="col-md-12">
									<label for="fname">Name</label>
									<input type="text" name="name" id="fname" class="form-control" placeholder="Your name">
								</div>
							</div>

							<div class="row form-group">
								<div class="col-md-12">
									<label for="email">Email</label>
									<input type="text" name="email" id="email" class="form-control" placeholder="Your email address">
								</div>
							</div>

							<div class="row form-group">
								<div class="col-md-12">
									<label for="message">Message</label>
									<textarea name="message" id="message" cols="30" rows="10" class="form-control" placeholder="Say something about us">Hi Tanbir, </textarea>
								</div>
							</div>
							<div class="form-group">
								<input type="submit" value="Send Message" class="btn btn-primary">
							</div>
						</form>		
					</div>
          </div>

@endsection