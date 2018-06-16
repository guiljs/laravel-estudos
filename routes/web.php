<?php

Route::get('/', 'PostsController@index');

Route::get('/posts/create', 'PostsController@create');

Route::post('/posts','PostsController@store');

Route::get('/posts/{post}', 'PostsController@show');

Route::patch('/posts/{post}/comments','CommentsController@store');



//controller => PostsController

// Eloquent model => Post

// migration => create_posts_table