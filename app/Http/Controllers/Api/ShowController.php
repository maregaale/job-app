<?php

namespace App\Http\Controllers\Api;
use App\Work;
use App\Step;


use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class ShowController extends Controller
{
    public function workSteps($work)
    {
        $num_work = intval($work);

        
        $steps = Step::where('work_id', $num_work)->get();

        return response()->json($steps);
    }
}
