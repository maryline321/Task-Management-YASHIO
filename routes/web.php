<?php

use App\Http\Controllers\TaskController;
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

// Route::get('task-list', [TaskController::class, 'showTasks']);

// Route::get('/users/{userId}/tasks', [TaskController::class, 'showTasks']);
Route::get('/tasks', [TaskController::class, 'showTasks']);

Route::get('addtasks', [TaskController::class, 'addtasks']);
Route::post('savetasks', [TaskController::class, 'savetasks']);



Route::get('/', function () {
    return view('welcome');
});

Route::middleware([
    'auth:sanctum',
    config('jetstream.auth_session'),
    'verified'
])->group(function () {
    Route::get('/dashboard', function () {
        return view('dashboard');
    })->name('dashboard');
});
