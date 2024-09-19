<?php

use App\Http\Controllers\Api\TaskController;
// use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

Route::middleware('api.token')->apiResource('tasks', TaskController::class);
// Route::apiResource('/tasks', TaskController::class);