@extends('layouts.master')

@section('content')
	<div class="row">
		<div class="col-sm-6 col-sm-offset-3">
			<form method="POST" action="{{ action('Auth\AuthController@postRegister') }}">
				{{ csrf_field() }}
				<div class="form-group">
			    	<label for="name">Name:</label>
			    	<input type="text" class="form-control" name="name" value="{{ old('name') }}">
			  	</div>
				<div class="form-group">
			    	<label for="email">Email:</label>
			    	<input type="text" class="form-control" name="email" value="{{ old('email') }}">
			  	</div>
				<div class="form-group">
			    	<label for="password">Password:</label>
			    	<input type="password" class="form-control" name="password">
			  	</div>
				<div class="form-group">
			    	<label for="password_confirmation">Password Confirmation:</label>
			    	<input type="password" class="form-control" name="password_confirmation">
			  	</div>
			  	<button type="submit" class="btn btn-success">Register</button>
			</form>
		</div>
	</div>
@stop