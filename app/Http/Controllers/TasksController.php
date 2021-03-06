<?php

namespace App\Http\Controllers;

use App\Task;

class TasksController extends Controller
{
    public function index()
    {

        // $tasks = DB::table('tasks')->get();
        $tasks = Task::all();
        $name = 'Guilherme';
        $teste = 'TESTE';
        return view('tasks.index', compact('name', 'teste', 'tasks'));
    }

    public function show(Task $task) //Task::find(wildcard)
    {
        // return $task;  //Return a Json of task object
        // $task = Task::find($id);

        return view('tasks.show', compact('task'));
    }
}
