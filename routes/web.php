<?php

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
 */

Route::get('/tasks', function () {

    $tasks = DB::table('tasks')->get();
    $name = 'Guilherme';
    $teste = 'TESTE';
    return view('tasks.index', compact('name', 'teste', 'tasks'));
});

Route::get('/tasks/{task}', function ($id) {

    // dd($id); //Die and dump
    // $tasks = DB::table('tasks')->find($id);
    $tasks = App\Task::all();

    return view('tasks.show', compact('tasks'));
});

Route::get('/about', function () {
    return view('about');
});
