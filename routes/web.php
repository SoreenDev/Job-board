<?php

use App\Http\Controllers\AuthController;
use App\Http\Controllers\EmployerController;
use App\Http\Controllers\JobApplicationController;
use App\Http\Controllers\JobController;
use App\Http\Controllers\MyJobApplicationController;
use App\Http\Controllers\MyJobController;
use App\Models\Employer;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/
Route::get('/',fn()=> to_route('job.index'));

Route::get('login', fn() => to_route('auth.create'))->name('login'); # for middleware auth
Route::resource('auth', AuthController::class)->only('store','create');
Route::delete('logout' , fn() => to_route('auth.destroy'))->name('logout');
Route::delete('auth',[AuthController::class,'destroy'])->name('auth.destroy');

Route::resource('job', JobController::class)->only('index','show');

Route::middleware('auth')->group(function(){
   Route::resource('job.application', JobApplicationController::class)->only('create','store');
   Route::resource('my_job_application', MyJobApplicationController::class)->only('index','destroy');
   Route::resource('employer', EmployerController::class)->only('create','store');
   Route::resource('my_jobs', MyJobController::class)->middleware('employer');

});
