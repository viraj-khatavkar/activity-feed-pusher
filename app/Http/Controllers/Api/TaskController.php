<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Task;
use Illuminate\Http\Request;

class TaskController extends Controller
{
	public function index(Task $task)
	{
		return auth()->user()->tasks;
	}

    public function store()
    {
    	$task = Task::create([
    		'title' => request('title'),
    		'user_id' => auth()->user()->id,
		]);

        return Task::find($task->id);
    }
}
