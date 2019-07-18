<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Post extends Model
{
    protected $table = 'posts';
    protected $fillable = ['user_id', 'title', 'body'];

    /* Relations */
    public function owner() {
    	return $this->belongsTo(User::class, 'user_id');
    }

    public function comments()
    {
    	return $this->hasMany(Comment::class, 'post_id');
    }

    public function path()
    {
        return "/posts/{$this->id}";
    }
}
