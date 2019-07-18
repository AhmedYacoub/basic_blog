<?php

namespace App\Http\Controllers;

use App\Comment;
use App\Reply;
use Illuminate\Http\Request;

class RepliesController extends Controller
{
    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Comment $comment)
    {
        $this->validate(request(), [
            'new_reply' => 'required|min:1|max:255'
        ]);

        $comment->replies()->create([
            'user_id' => auth()->id(),
            'body' => request()->new_reply
        ]);

        return redirect()->back();
    }
}
