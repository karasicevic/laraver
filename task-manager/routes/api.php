<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\UserController;
use App\Http\Controllers\ProjectController;
use App\Http\Controllers\TaskController;
use App\Http\Controllers\ProjectTaskController;
use App\Http\Controllers\UserTaskController;
use App\Http\Controllers\API\AuthController;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "api" middleware group. Make something great!
|

*/

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});

//rute za CRUD
Route::resource('users', UserController::class);
Route::resource('projects', ProjectController::class);
Route::resource('tasks', TaskController::class);

//ugnježdene rute
Route::get('/users/{id}/tasks', [UserTaskController::class, 'index'])->name('users.tasks.index');
Route::get('/projects/{id}/tasks', [ProjectTaskController::class, 'index'])->name('projects.tasks.index');

//rute za auth
Route::post('/register', [AuthController::class, 'register']);
Route::post('/login', [AuthController::class, 'login']);


Route::group(['middleware' => ['auth:sanctum']], function () {
    Route::get('/profile', function(Request $request) {
        return auth()->user();
    });
    Route::resource('tasks', TaskController::class)->only(['update','store','destroy']);
    Route::resource('users', TaskController::class)->only(['update','store','destroy']);
    Route::resource('projects', TaskController::class)->only(['update','store','destroy']);
    Route::post('/logout', [AuthController::class, 'logout']);
    
});
