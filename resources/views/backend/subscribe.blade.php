@extends('layouts.backend')
@section('content')

<div class="row-fluid sortable">
	<div class="row-fluid sortable">		
				<div class="box span12">
					<div class="box-header" data-original-title>
						<h2><i class="halflings-icon user"></i><span class="break"></span>All Subscribe</h2>
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
								  <th>Email</th>
							  </tr>
						  </thead>   
						  <tbody>
						  <?php $i=1; ?>
						  @foreach ($subscribe as $subscribes)
						  
							<tr>
								<td><?php echo $i++; ?></td>
								<td>{{$subscribes->email}}</td>
							</tr>
						  @endforeach
						  </tbody>
					  </table>            
					</div>
				</div><!--/span-->
			
			</div>
</div>

@endsection