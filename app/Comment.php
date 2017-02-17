<?php

namespace App;

use App\RecordsActivity;
use App\Task;
use Illuminate\Database\Eloquent\Model;

class Comment extends Model
{
	use RecordsActivity;

    protected $fillable = ['user_id', 'task_id', 'body'];

    protected static $recordEvents = ['created'];

    public function task()
    {
    	return $this->belongsTo(Task::class);
    }
}
