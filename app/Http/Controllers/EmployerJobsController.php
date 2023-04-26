<?php

namespace App\Http\Controllers;

use App\Models\Job;
use App\Events\Hello;
use Illuminate\Http\Request;
use App\Events\JobWasCreated;
use Illuminate\Support\Facades\Auth;

class EmployerJobsController extends Controller
{

    public function index(){
        $user = Auth::user();
        $jobs = Job::where('user_id', $user->id)->get();

        return response()->json(['data'=>$jobs]);

    }


    public function test(Request $request){
        $user = $request->user();
        $job = $user->jobs()->create($request->all());
        broadcast(new Hello());

        return response()->json(['message'=>'successfully added', 'result'=>$job]);
    }
}
