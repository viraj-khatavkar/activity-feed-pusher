<?php

namespace App\Http\Controllers;

use App\Task;
use App\User;
use Illuminate\Http\Request;

class TaskController extends Controller
{
    public function create()
    {
    	return view('tasks.create');
    }

    public function destroy(Task $task)
    {
		$task->delete();

		return redirect('/tasks/create');
    }
}
