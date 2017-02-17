<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Transformers\ActivityTransformer;
use Illuminate\Http\Request;

class ActivityController extends Controller
{
    public function index()
    {
    	$activities = auth()->user()->activity()->latest()->get();
    	
    	return fractal($activities, new ActivityTransformer())->respond();
    }
}
