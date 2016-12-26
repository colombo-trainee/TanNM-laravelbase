@extends('admin.layout')
@section('nav-item')
<li class="nav-item active">
	<a class="nav-link" href="{{ route('admin.pages') }}" >Pages<span class="sr-only">(current)</span></a>
</li>
<li class="nav-item">
	<a class="nav-link" href="#">User</a>
</li> 
@endsection
@section('title','| Edit POst')
@section('script')
<script type='text/javascript' src="{{ asset('js/tinymce/tinymce.min.js') }}"></script>
<script type='text/javascript' src="{{ asset('js/editPost.js') }}"></script>
<script src="/vendor/laravel-filemanager/js/lfm.js"></script>
@endsection
@section('content')
<div class="container">
	<div class="content">
	<h2 class="display-4 align-center">Edit Page</h2>
		<hr>
		{{ Form::model($post , ['route'=>['post.update',$post->id] , 'method'=>'PATCH', 'enctype'=>'multipart/form-data']) }}
		<!-- <form action="{{ route('post.update' , $post->id) }}" method='PUT' enctype="multipart/form-data" novalidate> -->
			
				{{ csrf_field() }}
			<div class="form-group row">
				<label for="title" class="col-xs-2 col-form-label">Tiêu đề</label>
				<div class="col-xs-10">
					<input class="form-control" type="text" id="title" placeholder="Title" name='title' required value="{{ $post->title }}">
				</div>
				  @if($errors->has('title'))
                        <small id="help-block" class="form-text text-muted">{{ $errors->first('title') }}</small>
				@endif
			</div>
			<div class="form-group row">
				<div class="col-xs-2">
				@if($post->thumb!=null)
				<img src="{{ asset($post->thumb) }}" alt="" class="img-fluid">
				@endif
				</div>
			</div>
			<div class="form-group row">
				<label for="thumb" class="col-xs-2 col-form-label">Ảnh đại diện</label>
				<div class="col-xs-10">
					{{ Form::file('thumb' ,null , ['class'=>'form-control','accept'=>'image/*' ]) }}
					<!-- <input class="form-control" type="file"  id="thumb" name="thumb"  accept="image/*"> -->
					
				</div>
				  @if($errors->has('thumb'))
                        <small id="help-block" class="form-text text-muted">{{ $errors->first('thumb') }}</small>
					@endif
			</div>
			
			<div class="form-group row">
				<label for="content" class="col-xs-2 col-form-label">Nội dung</label>
				<div class="col-xs-12">
					<textarea name="content" id="content" required>{{ $post->content }}</textarea>
				</div>
			</div>
			<br>
			<button type='submit' class='btn btn-success btn-lg'>Edit</button>
		<!-- </form> -->
		{{ Form::close() }}
	</div>
</div>
<script>
</script>
@endsection