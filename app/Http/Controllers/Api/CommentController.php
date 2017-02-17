<?php

namespace App\Http\Controllers\Api;

use App\Comment;
use App\Http\Controllers\Controller;
use App\Task;

class CommentController extends Controller
{
    public function index(Task $task)
    {
        return $task->comments;
    }

    public function store(Task $task)
    {
        return $task->comments()->create([
            'user_id' => request()->user()->id,
            'body' => request('comment'),
        ]);
    }
}
