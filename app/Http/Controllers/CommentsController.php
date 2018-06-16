<?php

namespace App\Http\Controllers;

use App\Post;

class CommentsController extends Controller
{
    public function store(Post $post)
    {
        $this->validate(request(), ['body' => 'required|min:2']);

        // Comment::create([
        //     'body' => request('body'),
        //     'post_id' => $post->id,
        //     'user_id' => 1
        // ]);

        $post->addComment(request('body'));

        return back(); //Redirect back.
    }
}
