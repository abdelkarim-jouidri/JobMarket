<?php

namespace App\Http\Controllers;

use App\Models\Job;
use App\Models\Test;
use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use Illuminate\Foundation\Bus\DispatchesJobs;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Http\Request;
use Illuminate\Routing\Controller as BaseController;

class Controller extends BaseController
{
    use AuthorizesRequests, DispatchesJobs, ValidatesRequests;

    public function test(Request $request){
        $data = [
            'title'=>$request->title,
            'status'=>$request->status,
            'description'=>$request->description,
            'job_type'=>$request->job_type,
            'contract_type'=>$request->contract_type
        ];

    
        Job::create($data);
        return response()->json(['success' => true]);
    }

    public function index(){
        $data = Job::all();
        return response()->json($data);
    }

    public function destroy(Job $job){
        $job->delete();
        return response()->json(['success' => true]);

    }

    public function show(Job $job){
        return response()->json(['job'=>$job]);
    }

    public function update(Request $request,Job $job){

        return response()->json(['request'=>$request->all()]);
    }
}
