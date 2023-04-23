<?php

namespace App\Http\Controllers;

use App\Models\Job;
use App\Events\Hello;
use Illuminate\Http\Request;
use App\Events\JobWasCreated;

class EmployerJobsController extends Controller
{

    public function index(){
        $jobs = Job::all();

        return response()->json(['data'=>$jobs]);

    }


    public function test(Request $request){
        $user = $request->user();
        $job = $user->jobs()->create($request->all());
        broadcast(new Hello());

        return response()->json(['message'=>'successfully added', 'result'=>$job]);
    }
}
