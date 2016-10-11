@extends('layouts.master')

@section('content')
	<div class="row">
		<div class="col-sm-10">
			<h1>{{ $post->title }}</h1>
			<h2>Posted By: <a href="{{ action('UsersController@show', $post->user->id) }}">{{ $post->user->name }}</a></h2>
			<p><a href="{{ $post->url }}">{{ $post->url }}</a></p>
			<p>{{ $post->content }}</p>
		</div>
		<div class="col-sm-2">
			<div class="row">
				<img src="/img/upvote.png" data-vote="1" data-post-id="{{ $post->id }}" class="vote img-responsive center-block {{ (!is_null($user_vote) && $user_vote->vote) ? 'active' : '' }}">
			</div>
			<div class="row">
				<p class="vote-score text-center" id="vote-score">{{ $post->voteScore() }}</p>
			</div>
			<div class="row">
				<img src="/img/downvote.png" data-vote="0" data-post-id="{{ $post->id }}" class="vote img-responsive center-block {{ (!is_null($user_vote) && !$user_vote->vote) ? 'active' : '' }}">
			</div>
		</div>
		@if($post->ownedBy(Auth::user()))
			<div class="col-sm-12">
				<a href="{{ action('PostsController@edit', $post->id) }}" class="btn btn-primary">Edit <i class="fa fa-pencil"></i></a>
				<a href="{{ action('PostsController@destroy', $post->id) }}" class="btn btn-danger post-delete-link">Delete <i class="fa fa-trash"></i></a>
			</div>
			<form method="POST" id="post-delete-form">
				{{ method_field('DELETE') }}
				{{ csrf_field() }}
			</form>
		@endif
		<input type="hidden" id="vote-url" value="{{ action('PostsController@addVote') }}">
		<input type="hidden" id="csrf-token" value="{{ Session::token() }}">
		<input type="hidden" id="is-logged-in" value="{{ Auth::check() }}">

	</div>

@stop

@section('bottom-scripts')
	<script src="/js/delete-post.js"></script>
	<script src="/js/votes.js"></script>

@stop