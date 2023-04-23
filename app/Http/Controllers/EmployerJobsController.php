<?php

namespace App\Http\Controllers;

use App\Events\JobWasCreated;
use App\Models\Job;
use Illuminate\Http\Request;

class EmployerJobsController extends Controller
{

    public function index(){
        $jobs = Job::all();

        return response()->json(['data'=>$jobs]);

    }


    public function test(Request $request){
        $user = $request->user();
        $job = $user->jobs()->create($request->all());
        broadcast(new JobWasCreated($job));
        return response()->json(['message'=>'successfully added', 'result'=>$job]);
    }
}
