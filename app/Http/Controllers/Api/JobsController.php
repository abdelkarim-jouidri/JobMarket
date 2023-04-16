<?php

namespace App\Http\Controllers\Api;

use App\Models\Job;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Http\Resources\JobResource;

class JobsController extends Controller
{
    public function index()
    {
        return JobResource::collection(Job::get());
    }
}