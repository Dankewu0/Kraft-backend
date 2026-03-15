<?php

use App\Http\Controllers\TaskController;
use Illuminate\Support\Facades\Route;

Route::prefix('task')->group(function () {
    Route::get('/', [TaskController::class, 'index']);
    Route::get('{task}', [TaskController::class, 'show']);
    Route::post('/', [TaskController::class, 'store']);
    Route::put('{task}', [TaskController::class, 'update']);
    Route::delete('{task}', [TaskController::class, 'destroy']);
});
