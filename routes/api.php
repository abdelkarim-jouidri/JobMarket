<?php

use App\Models\User;
use App\Events\Hello;
use Illuminate\Http\Request;
use Laravel\Fortify\Features;
use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Broadcast;
use App\Http\Controllers\Api\JobsController;
use App\Http\Controllers\EmployerJobsController;
use App\Http\Controllers\auth\RegisterController;
use Laravel\Fortify\Http\Controllers\RegisteredUserController;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    $user = $request->user();
    
    $user->isEmployer = $user->isEmployer();
    $user->isCandidate = $user->isCandidate();
    return $request->user();
});

Broadcast::routes(['middleware' => ['auth:sanctum']]);

Route::get('/myjobs',[JobsController::class,'fetch']);

Route::get('/jobs',[JobsController::class,'index']);
Route::post('/jobs',[JobsController::class,'store']);
Route::get('/jobs/{job}',[JobsController::class,'show']);
Route::put('/jobs/{job}',[JobsController::class,'update']);

Route::get('/employer/jobs',[EmployerJobsController::class,'index']);
Route::post('/employer/jobs',[EmployerJobsController::class,'test']);

if (Features::enabled(Features::registration())) {
    

    Route::post('/register', [RegisterController::class,'store']);
}

Route::get('/broadcast',function(){

    broadcast(new Hello());
    return "Event has been sent!";
});

Route::middleware('auth:sanctum')->get('/user/token', function (Request $request) {
    return $request->user()->createToken('my-token')->plainTextToken;
});