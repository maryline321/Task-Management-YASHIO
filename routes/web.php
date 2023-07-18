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

Route::get('/home', [TaskController::class, 'index']);


Route::get('/tasks', [TaskController::class, 'showTasks']);

Route::get('addtasks', [TaskController::class, 'addTasks']);
Route::post('savetasks', [TaskController::class, 'saveTasks']);
Route::get('edittask/{id}', [TaskController::class, 'editTask']);
Route::post('updatetask', [TaskController::class, 'updateTask']);
Route::get('deletetask/{id}', [TaskController::class, 'deleteTask']);




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
