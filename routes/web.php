<?php

use App\Http\Controllers\auth\loginController;
use App\Http\Controllers\auth\RegisterController;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function () {
    return view('welcome2');
});




Route::get('/register', [RegisterController::class,'create'])->middleware('guest');
Route::post('/register', [RegisterController::class,'store'])->middleware('guest');;
Route::get('/login', [loginController::class,'store']);

Route::post('/dashboard/myjobs',[Controller::class,'test']);
Route::get('/about',[Controller::class,'index']);
Route::delete('/dashboard/myjobs/{job}',[Controller::class,'destroy']);