<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Post extends Model
{
	use SoftDeletes;

	public static $rules = [
        'title' => 'required|min:5|max:100',
        'url' => 'required',
        'content' => 'required'
    ];

    public static function searchByTitleContentOrOwner($searchTerm)
    {
    	return static::join('users', 'users.id', '=', 'posts.created_by')->where('posts.content', 'LIKE', "%{$searchTerm}%")->orWhere('posts.title', 'LIKE', "%{$searchTerm}%")->orWhere('users.name', 'LIKE', "%{$searchTerm}%")->select('*', 'posts.id as id');
    }

    public function user()
	{
		return $this->belongsTo(User::class, 'created_by', 'id');
	}

    public function votes()
    {
        return $this->hasMany(Vote::class);
    }

    public function upvotes()
    {
        return $this->votes()->where('vote', '=', 1);
    }

    public function downvotes()
    {
        return $this->votes()->where('vote', '=', 0);
    }

    public function userVote($user)
    {
        return $this->hasMany(Vote::class)->where('user_id', '=', $user->id)->first();
    }

    public function voteScore()
    {
        $upvotes = $this->upvotes()->count();
        $downvotes = $this->downvotes()->count();
        return $upvotes - $downvotes;
    }

    public function ownedBy($user)
    {
        return (!is_null($user)) ?  $this->created_by == $user->id : false;
    }
}