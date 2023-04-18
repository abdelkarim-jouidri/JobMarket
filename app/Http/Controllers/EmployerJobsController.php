<?php

namespace App\Http\Controllers;

use App\Events\Test;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class EmployerJobsController extends Controller
{
    public function __construct()
    {
        $this->middleware(['auth:sanctum']);
    }

    public function index()
    {
        $user = auth()->user();
        $data = $user->jobs;
        broadcast(new Test($data));
        return response()->json(['jobs'=>$data]);
    }

    public function test(Request $request)
    {
        return response()->json(['response'=>$request->user()]);
    }
}
