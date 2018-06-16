<?php

Route::get('/', 'PostsController@index');
// Route::get('/post/{post}', 'PostsController@show');
Route::get('/post/create', 'PostsController@create');

Route::post('/posts','PostsController@store');


//controller => PostsController

// Eloquent model => Post

// migration => create_posts_table