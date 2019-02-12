@extends('layouts.backend')

@section('stylesheets')

	<script src="//cdn.tinymce.com/4/tinymce.min.js"></script>

	<script>
		tinymce.init({
			selector: 'textarea',
			plugins: 'link code',
			menubar: false,
			forced_root_block : ""
		});
	</script>

@endsection

@section('content')

<div class="row-fluid sortable">
				<div class="box span12">
					<div class="box-header" data-original-title>
						<h2><i class="halflings-icon edit"></i><span class="break"></span>Edit Post</h2>
						<div class="box-icon">
							<a href="#" class="btn-setting"><i class="halflings-icon wrench"></i></a>
							<a href="#" class="btn-minimize"><i class="halflings-icon chevron-up"></i></a>
							<a href="#" class="btn-close"><i class="halflings-icon remove"></i></a>
						</div>
					</div>
					<div class="box-content">
						<form action="{{route('editpost',['id' => $post->id])}}" method="post" class="form-horizontal" enctype="multipart/form-data">
						@csrf
						  <fieldset>
							<div class="control-group">
							  <label class="control-label" for="typeahead">Title: </label>
							  <div class="controls">
								<input name="title" value="{{$post->title}}" type="text" class="span6 typeahead" id="typeahead"  data-provide="typeahead" data-items="4">
							  </div>
							</div>
							<div class="control-group">
							  <label class="control-label" for="typeahead">Slug: </label>
							  <div class="controls">
								<input name="slug" value="{{$post->slug}}" type="text" class="span6 typeahead" id="typeahead"  data-provide="typeahead" data-items="4">
							  </div>
							</div>
							<div class="control-group">
								<label class="control-label" for="selectError3">Category Select:</label>
								<div class="controls">
								  <select name="category_id" id="selectError3" class="span6 typeahead">
								  @foreach($categories as $category)
									<option value="{{$category->id}}">{{$category->name}}</option>
								  @endforeach
								  </select>
								</div>
							  </div>
							  <div class="control-group">
								<label class="control-label" for="selectError1">Tags:</label>
								<div class="controls">
								  <select name="tag_id[]" id="selectError1" multiple data-rel="chosen" class="span6 typeahead">
								@foreach ($tags as $tag)
								<option value="{{ $tag->id }}">{{ $tag->name }}
								</option>
								@endforeach
								
								@foreach ($post->tag as $tags)
								<option value="{{ $tags->id }}" selected>{{ $tags->name }}</option>
								@endforeach
								  </select>
								</div>
							  </div>
							  
							  <div class="control-group">
							  <label class="control-label" for="fileInput">Previous Image:</label>
							  <div class="controls">
								<img src="{{asset('/images/' . $post->image)}}" width="20%" height="20%">
							  </div>
							</div>
							<div class="control-group">
							  <label class="control-label" for="fileInput">Featured Image:</label>
							  <div class="controls">
								<input name="upload_images" class="input-file uniform_on" id="fileInput" type="file">
							  </div>
							</div>          
							<div class="control-group hidden-phone">
							  <label class="control-label" for="textarea2">Post:</label>
							  <div class="controls">
								<textarea name="body" class="body" id="body" rows="2">{{$post->post}}</textarea>
							  </div>
							</div>
							<div class="control-group">
								<label class="control-label">Published:</label>
								<div class="controls">
								  <label class="checkbox inline">
									<input name="published" type="checkbox" id="inlineCheckbox1" value="1">
								  </label>
								</div>
							  </div>
							<div class="form-actions">
							  <button type="submit" class="btn btn-primary">Save</button>
							  <button type="reset" class="btn">Cancel</button>
							</div>
						  </fieldset>
						</form>   

					</div>
				</div><!--/span-->

			</div><!--/row-->

@endsection