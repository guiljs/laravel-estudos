<?php

namespace App\Http\Controllers;

use App\Post;

// use Model\Post;

class PostsController extends Controller
{
    public function index()
    {
        return view('posts.index');

    }

    public function show()
    {
        return view('posts.show');
    }

    public function create()
    {
        return view('posts.create');
    }

    public function store()
    {
        // dd(request()->all());
        // dd(request('title'));
        // dd(request(['title','body']));

        //Let's create a new post
        // // $post = new \App\Post;
        // $post = new Post;

        // $post->title = request('title');

        // $post->body = request('body');

        // //Save to DB
        // $post->save();

        //Avoid to use like this
        //Post::create(request()->all()); Because we turned off the $guarded in App\Model

        // Post::create([
        //     'title' => request('title'),
        //     'body' => request('body'),
        // ]);

        $this->validate(request(), [
            'title' => 'required',
            'body' => 'required',
        ]);

        Post::create(request(['title', 'body'])); //Can use this way instead of above if the fields in the form correspond to database.

        //Redirect back to home page
        return redirect('/');
    }

}
