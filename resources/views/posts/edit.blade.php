@extends('layouts.master')

@section('content')
	<div class="row">
		<div class="col-sm-6 col-sm-offset-3">
			<form method="POST" action="{{ action('PostsController@update', $post->id) }}">
				{{ method_field('PUT') }}
				{{ csrf_field() }}
				<div class="form-group">
			    	<label for="title">Title:</label>
			    	<input type="text" class="form-control" name="title" value="{{ empty(old('title')) ? $post->title : old('title') }}">
			  	</div>
				<div class="form-group">
			    	<label for="url">URL:</label>
			    	<input type="text" class="form-control" name="url" value="{{ empty(old('url')) ? $post->url : old('url') }}">
			  	</div>
				<div class="form-group">
			    	<label for="content">Content:</label>
			    	<textarea type="text" class="form-control" name="content">{{ empty(old('content')) ? $post->content : old('content') }}</textarea>
			  	</div>
			  	<button type="submit" class="btn btn-success">Save Post</button>
			</form>
		</div>
	</div>
@stop