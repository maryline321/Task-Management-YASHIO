<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\TaskController;

Route::get('/tasks', [TaskController::class, 'showTasks']);

Route::get('addtasks', [TaskController::class, 'addTasks']);
Route::post('savetasks', [TaskController::class, 'saveTasks']);
Route::get('edittask/{id}', [TaskController::class, 'editTask']);
Route::post('updatetask', [TaskController::class, 'updateTask']);
Route::get('deletetask/{id}', [TaskController::class, 'deleteTask']);
