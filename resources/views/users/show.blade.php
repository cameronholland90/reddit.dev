@extends('layouts.master')

@section('content')
	<div class="row">
		<div class="col-sm-12">
			<h1>{{ $user->name }}</h1>
			<h2>{{ $user->email }}</h2>
		</div>
		<div class="col-sm-12">
			<table class="table table-striped">
				<thead>
					<tr>
						<th>ID</th>
						<th>Title</th>
						<th>URL</th>
						<th>Content</th>
						<th>Owner</th>
						<th>Actions</th>
					</tr>
				</thead>
				<tbody>
					@foreach ($user->posts as $post)
					<tr>
						<td>{{ $post->id }}</td>
						<td>{{ $post->title }}</td>
						<td><a href="{{ $post->url }}">{{ $post->url }}</a></td>
						<td>{{ $post->content }}</td>
						<td>{{ $post->user->name }}</td>
						<td>
							<a href="{{ action('PostsController@show', $post->id) }}" class="btn btn-primary"><i class="fa fa-search-plus"></i></a>
							@if(Auth::id() == $user->id)
								<a href="{{ action('PostsController@edit', $post->id) }}" class="btn btn-success"><i class="fa fa-pencil"></i></a>
								<a href="{{ action('PostsController@destroy', $post->id) }}" class="btn btn-danger post-delete-link"><i class="fa fa-trash"></i></a>
							@endif
						</td>
					</tr>
					@endforeach
				</tbody>
			</table>
		</div>
	</div>
@stop