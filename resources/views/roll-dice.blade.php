@extends('layouts.master')

@section('content')
	<h1>{{ $message }}</h1>
	<p>Your guess: {{ $guess }}</p>
	<p>Random number: {{ $random }}</p>

	<ul>
		<li><a href="{{ action('HomeController@rollDice', 1) }}">1</a></li>
		<li><a href="{{ action('HomeController@rollDice', 2) }}">2</a></li>
		<li><a href="{{ action('HomeController@rollDice', 3) }}">3</a></li>
		<li><a href="{{ action('HomeController@rollDice', 4) }}">4</a></li>
		<li><a href="{{ action('HomeController@rollDice', 5) }}">5</a></li>
		<li><a href="{{ action('HomeController@rollDice', 6) }}">6</a></li>
	</ul>
@stop