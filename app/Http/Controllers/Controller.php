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

        Test::create(['attr1'=>$request->attr1]);
        return response()->json(['success' => true]);
    }

    public function index(){
        $data = Job::all();
        return response()->json($data);
    }
}
