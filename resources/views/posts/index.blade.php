@extends('layouts.master')

@section('content')
	<div class="row">
		<div class="col-sm-12">
			<table class="table table-striped">
				<thead>
					<tr>
						<th>Vote Score</th>
						<th>Title</th>
						<th>URL</th>
						<th>Content</th>
						<th>Owner</th>
						<th>Actions</th>
					</tr>
				</thead>
				<tbody>
					@foreach ($posts as $post)
					<tr>
						<td>{{ $post->vote_score }}</td>
						<td>{{ $post->title }}</td>
						<td><a href="{{ $post->url }}">{{ $post->url }}</a></td>
						<td>{{ $post->content }}</td>
						<td>{{ $post->user->name }}</td>
						<td>
							<a href="{{ action('PostsController@show', $post->id) }}" class="btn btn-primary"><i class="fa fa-search-plus"></i></a>
							@if($post->ownedBy(Auth::user()))
								<a href="{{ action('PostsController@edit', $post->id) }}" class="btn btn-success"><i class="fa fa-pencil"></i></a>
								<a href="{{ action('PostsController@destroy', $post->id) }}" class="btn btn-danger post-delete-link"><i class="fa fa-trash"></i></a>
							@endif
						</td>
					</tr>
					@endforeach
				</tbody>
			</table>
			<form method="POST" id="post-delete-form">
				{{ method_field('DELETE') }}
				{{ csrf_field() }}
			</form>
			@if(isset($searchTerm) && !is_null($searchTerm))
				{!! $posts->appends(['search' => $searchTerm])->render() !!}
			@else
				{!! $posts->render() !!}
			@endif
		</div>
	</div>
@stop

@section('bottom-scripts')
	<script src="/js/delete-post.js"></script>
@stop