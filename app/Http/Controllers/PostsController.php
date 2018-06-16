<?php

namespace App\Http\Controllers;

use App\Post;

// use Model\Post;

class PostsController extends Controller
{
    public function index()
    {
        // $posts = Post::orderBy('id','DESC')->get();
        $posts = Post::latest()->get(); //It is a query scope, so it's shorter than line above

        return view('posts.index', compact('posts')); //My post view has access to a collection of posts

    }

    // public function show($id)
    // {
    //     $post = Post::find($id);

    //     return view('posts.show', compact('post'));
    // }
    public function show(Post $post)
    {
        //REmember if we use show(Post $post) insted of show($id), Laravel recognizes and do the job for us.
        // $post = Post::find($id);

        return view('posts.show', compact('post'));
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
