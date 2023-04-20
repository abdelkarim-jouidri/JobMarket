<?php

namespace App\Http\Controllers\Api;

use App\Models\Job;
use App\Events\Hello;
use Illuminate\Http\Request;
use App\Http\Resources\JobResource;
use App\Http\Controllers\Controller;

class JobsController extends Controller
{
    public function index()
    {
        return JobResource::collection(Job::get());
    }

    public function store(Request $request){
        Job::create($request->all());
        return response()->json(['response'=>'successfully added']);
    }

    public function show(Job $job)
    {
        return response()->json(['job'=>$job]);
    }

    public function update(Request $request, Job $job){
        $job->update($request->all());
        broadcast(new Hello());

        return response()->json(['message'=>'Job has been successfully updated']);
    }
}
