@extends('layouts.backend')
@section('content')
			
			<!-- start: Content -->
			<div id="content" class="span10">
			
			
			<ul class="breadcrumb">
				<li>
					<i class="icon-home"></i>
					<a href="index.html">Home</a> 
					<i class="icon-angle-right"></i>
				</li>
				<li><a href="#">Dashboard</a></li>
			</ul>

			<div class="row-fluid">
				
				<div class="span3 statbox purple" onTablet="span6" onDesktop="span3">
					<div class="boxchart">5,6,7,2,0,4,2,4,8,2,3,3,2</div>
					<div class="number">{{ $posts->count() }}<i class="icons icon-book"></i></div>
					<div class="title">Total Post</div>
					
				</div>
				<div class="span3 statbox green" onTablet="span6" onDesktop="span3">
					<div class="boxchart">1,2,6,4,0,8,2,4,5,3,1,7,5</div>
					<div class="number">{{ $categories->count() }}<i class="icons icon-file"></i></div>
					<div class="title">Total Categorie</div>
					
				</div>
				<div class="span3 statbox blue noMargin" onTablet="span6" onDesktop="span3">
					<div class="boxchart">5,6,7,2,0,-4,-2,4,8,2,3,3,2</div>
					<div class="number">{{ $tag->count() }}<i class="icons icon-tags"></i></div>
					<div class="title">Total Tag</div>
					
				</div>
				<div class="span3 statbox yellow" onTablet="span6" onDesktop="span3">
					<div class="boxchart">7,2,2,2,1,-4,-2,4,8,,0,3,3,5</div>
					<div class="number">{{ $subscribe->count() }}<i class="icons icon-check"></i></div>
					<div class="title">Total Subscriber</div>
					
				</div>	
				
			</div>		
<style type="text/css">
	.icons {
    font-size: 25px;
}
</style>

			
			
	<div class="clearfix"></div>
	
@endsection