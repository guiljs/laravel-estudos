<?php

Route::get('/', 'PostsController@index');
Route::get('/post/{post}', 'PostsController@show');


//controller => PostsController

// Eloquent model => Post

// migration => create_posts_table