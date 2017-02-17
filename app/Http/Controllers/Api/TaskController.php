<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Task;
use Illuminate\Http\Request;

class TaskController extends Controller
{
	public function index(Task $task)
	{
		return auth()->user()->tasks()->with('comments')->get();
	}

    public function store(Task $task)
    {
    	return $task->create([
    		'title' => request('title'),
    		'user_id' => auth()->user()->id,
		]);
    }
}
