<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\UserController;
use App\Http\Controllers\ProjectController;
use App\Http\Controllers\TaskControler;
use App\Http\Controllers\ProjectTaskControler;
use App\Http\Controllers\UserTaskControler;
use App\Http\Controllers\API\AuthControllerh;

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

Route::resource('users', UserController::class);
Route::resource('projects', ProjectController::class);
Route::resource('tasks', TaskController::class);

Route::get('/users/{id}/tasks', [UserTaskController::class, 'index'])->name('users.tasks.index');
Route::get('/project/{id}/tasks', [ProjectTaskController::class, 'index'])->name('projects.tasks.index');


Route::post('/register', [AuthController::class, 'register']);
Route::post('/login', [AuthController::class, 'login']);


Route::group(['middleware' => ['auth:sanctum']], function () {
    Route::get('/profile', function(Request $request) {
        return auth()->user();
    });
    Route::resource('posts', PostController::class)->only(['update','store','destroy']);

    // API route for logout user
    Route::post('/logout', [AuthController::class, 'logout']);
});
