<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Database\Eloquent\Model;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use App\Post;
use App\Vote;

class PostsController extends Controller
{


    public function __construct()
    {
        $this->middleware('auth', ['except' => ['index', 'show']]);
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $searchTerm = $request->input('search');

        if (!is_null($searchTerm)) {
            $posts = Post::searchByTitleContentOrOwner($searchTerm)->orderBy('vote_score', 'DESC')->with('user')->paginate(10);
        } else {
            $posts = Post::with('user')->orderBy('vote_score', 'DESC')->paginate(10);
        }

        $data = compact('searchTerm', 'posts');

        return view('posts.index')->with($data);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('posts.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $post = new Post();
        $post->created_by = 1;
        return $this->validateAndSave($post, $request);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show(Request $request, $id)
    {
        $post = Post::with('user')->findOrFail($id);
        if ($request->user()) {
            $user_vote = $post->userVote($request->user());
        } else {
            $user_vote = null;
        }

        $data = compact('post', 'user_vote');

        return view('posts.show')->with($data);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $post = Post::findOrFail($id);
        return view('posts.edit')->with('post', $post);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $post = Post::findOrFail($id);
        return $this->validateAndSave($post, $request);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Request $request, $id)
    {
        $post = Post::findOrFail($id);
        $post->delete();

        $request->session()->flash('SUCCESS_MESSAGE', 'Post deleted successfully');
        return redirect()->action('PostsController@index');
    }


    public function addVote(Request $request)
    {
        Model::unguard();
        $vote = Vote::with('post')->firstOrCreate([
            'post_id' => $request->input('post_id'),
            'user_id' => $request->user()->id
        ]);
        $vote->vote = $request->input('vote');
        $vote->save();
        Model::reguard();

        $post = $vote->post;
        $post->vote_score = $post->voteScore();
        $post->save();

        $data = [
            'vote_score' => $post->vote_score,
            'vote' => $vote->vote
        ];

        return $data;
    }


    private function validateAndSave(Post $post, Request $request) {
        $request->session()->flash('ERROR_MESSAGE', 'Post was not saved successfully');

        $this->validate($request, Post::$rules);

        $request->session()->forget('ERROR_MESSAGE');

        $post->title = $request->input('title');
        $post->url = $request->input('url');
        $post->content = $request->input('content');
        $post->save();

        $request->session()->flash('SUCCESS_MESSAGE', 'Post was saved successfully');
        return redirect()->action('PostsController@show', $post->id);
    }
}
