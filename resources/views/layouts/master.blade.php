<!DOCTYPE html>
<html>
<head>
	<title>Laravel App</title>
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css" integrity="sha384-1q8mTJOASx8j1Au+a5WDVnPi2lkFfwwEAa8hDDdjZlpLegxhjVME1fgjWPGmkzs7" crossorigin="anonymous">
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.4.0/css/font-awesome.min.css">
	<link rel="stylesheet" type="text/css" href="/css/main.css">
</head>
<body>
	@include('layouts.partials.navbar')
	<div class="container">
		@if (session()->has('ERROR_MESSAGE'))
		    <div class="alert alert-danger">{{ session('ERROR_MESSAGE') }}</div>
	   	@endif
		@if (session()->has('SUCCESS_MESSAGE'))
		    <div class="alert alert-success">{{ session('SUCCESS_MESSAGE') }}</div>
		@endif
		@yield('content')
	</div>
	<script src="//code.jquery.com/jquery-1.11.3.min.js"></script>
	<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.5/js/bootstrap.min.js"></script>
	<script src="/js/common.js"></script>
	@yield('bottom-scripts')
</body>
</html>