<?php

use App\Models\Job;
use App\Models\User;
use App\Events\Hello;
use App\Models\Application;
use Illuminate\Http\Request;
use Laravel\Fortify\Features;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Broadcast;
use App\Http\Controllers\ResumeController;
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
Route::delete('/jobs/{job}',[JobsController::class,'destroy']);

Route::post('/applications',function(Request $request){
    $application = new Application();
    $application->job_id = $request->id;
    $application->user_id = $request->user()->id;
    $application->save();
    return response()->json(['application'=>$application]);
});

Route::get('/application/{job_id}',function($job_id){
    $user_id = Auth::user()->id;
    $application = Application::where('job_id', $job_id)
                              ->where('user_id', $user_id)
                              ->first();
    if($application){

        return response()->json(['data'=>true]);
    }
    else {
        return response()->json(['data'=>false]);

    }
});

Route::get('/applications',function(){
    $user = Auth::user();
    $applications = $user->applications()->with('job')->get();

    // dd($applications);

    return response()->json(['applications'=>$applications]);

});

Route::get('/applications-by-employer',function(Request $request){
    $user = $request->user(); // Get the authenticated user
    $jobs = Job::where('user_id', $user->id)->pluck('id'); // Get the job ids created by the user
    $applications = App\Models\Application::whereIn('job_id', $jobs)->with('user')->with('job')->get(); // Get applications for the user's jobs

    return response()->json(['data'=>$applications]);

});




Route::get('/employer/jobs',[EmployerJobsController::class,'index']);
Route::post('/employer/jobs',[EmployerJobsController::class,'test']);
Route::post('upload-resume',[ResumeController::class,'uploadResume']);
Route::get('/download-resume/{id}', [ResumeController::class, 'downloadResume']);



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