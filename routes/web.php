<?php

use App\Http\Controllers\ProfileController;
use App\Http\Controllers\StudentProfileController;
use App\Http\Controllers\ProjectController;
use App\Http\Controllers\homepagecontroller;
use App\Http\Controllers\ApplicationController;
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

Route::get('/', function () {
    return view('welcome');
});

Route::get('/dashboard',[homepagecontroller::class, 'index'] )->middleware(['auth', 'verified'])->name('dashboard');
Route::get('/approve/{id}',[homepagecontroller::class, 'approve'] )->middleware(['auth', 'Teacher'])->name('approve');


Route::get('/application/create/{id}',[ApplicationController::class, 'create'] )->middleware(['auth', 'Student'])->name('ApplicationCreateForm');
Route::post('/apply',[ApplicationController::class, 'store'] )->middleware(['auth', 'Student'])->name('ApplicationStore');
Route::get('/assign',[ApplicationController::class, 'assign'] )->middleware(['auth', 'Teacher'])->name('assign_stds_to_project');

Route::get('/project/all',[ProjectController::class, 'index'] )->middleware(['auth'])->name('showProjectsAll');
Route::get('/partner/{id}',[homepagecontroller::class, 'listPartnerProjects'] )->middleware(['auth'])->name('showProjectsList');

Route::get('/project/create',[ProjectController::class, 'create'] )->middleware(['auth', 'inP','inPApproved'])->name('ProjectCreateForm');
Route::get('/project/{id}',[ProjectController::class, 'show'] )->middleware(['auth', 'verified'])->name('ProjectDetail');
Route::patch('/project/{id}',[ProjectController::class, 'update'] )->middleware(['auth', 'inP','inPApproved'])->name('ProjectUpdate');

Route::post('/project',[ProjectController::class, 'store'] )->middleware(['auth', 'inP','inPApproved'])->name('ProjectStore');
Route::delete('/project/delete', [ProjectController::class, 'destroy'])->middleware(['auth','inP','inPApproved'])->name('ProjectDelete');


Route::get('/student/all',[StudentProfileController::class, 'index'] )->middleware(['auth', 'verified'])->name('showStudentsAll');
Route::get('/studentprofile/create',[StudentProfileController::class, 'create'] )->middleware(['auth', 'Student'])->name('StudentProfileCreateForm');
Route::post('/student',[StudentProfileController::class, 'store'] )->middleware(['auth', 'Student'])->name('StudentProfileStore');
Route::get('/student/{id}',[StudentProfileController::class, 'show'] )->middleware(['auth', 'verified'])->name('StudentDetail');
Route::patch('/student/{id}',[StudentProfileController::class, 'update'] )->middleware(['auth', 'Student'])->name('StudentUpdate');


Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

require __DIR__.'/auth.php';
