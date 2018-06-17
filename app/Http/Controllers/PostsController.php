<?php

namespace App\Http\Controllers;

use App\Post;

// use Model\Post;

class PostsController extends Controller
{
    public function __construct()
    {

        $this->middleware('auth')->except('index', 'show');

    }
    public function index()
    {
        $posts = Post::latest()
            ->filter(request(['month', 'year']))
            ->get();

        // // $posts = Post::orderBy('id','DESC')->get();
        // $posts = Post::latest(); //It is a query scope, so it's shorter than line above

        // if ($month = request('month')) {
        //     $posts->whereMonth('created_at', Carbon::parse($month)->month);
        // }

        // if ($year = request('year')) {
        //     $posts->whereYear('created_at',$year);
        // }

        // $posts = $posts->get();

        $archives = Post::selectRaw('year(created_at) year, monthname(created_at) month , count(*) as published')
            ->groupBy('year', 'month')
            ->orderByRaw('min(created_at) desc')
            ->get()
            ->toArray();

        return view('posts.index', compact('posts', 'archives')); //My post view has access to a collection of posts

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

        auth()->user()->publish(
            new Post(request(['title', 'body']))
        );

        // Post::create(request(['title', 'body'])); //Can use this way instead of above if the fields in the form correspond to database.
        // Post::create([
        //     'title' => request('title'),
        //     'body' => request('body'),
        //     'user_id' => auth()->id()
        // ]);

        //Redirect back to home page
        return redirect('/');
    }

}
