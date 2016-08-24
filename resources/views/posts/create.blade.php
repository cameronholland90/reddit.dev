@extends('layouts.master')

@section('content')
	<div class="row">
		<div class="col-sm-6 col-sm-offset-3">
			<form method="POST" action="{{ action('PostsController@store') }}">
				{{ csrf_field() }}
				<div class="form-group">
			    	<label for="title">Title:</label>
			    	<input type="text" class="form-control" name="title" value="{{ old('title') }}">
			  	</div>
				<div class="form-group">
			    	<label for="url">URL:</label>
			    	<input type="text" class="form-control" name="url" value="{{ old('url') }}">
			  	</div>
				<div class="form-group">
			    	<label for="content">Content:</label>
			    	<textarea type="text" class="form-control" name="content">{{ old('content') }}</textarea>
			  	</div>
			  	<button type="submit" class="btn btn-success">Save Post</button>
			</form>
		</div>
	</div>
@stop