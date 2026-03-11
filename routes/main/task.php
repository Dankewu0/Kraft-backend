<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\TaskController;

Route::prefix("task")->group(function () {
    Route::get("/", [TaskController::class, "index"]);
    Route::post("/", [TaskController::class, "store"]);
    Route::put("{task}", [TaskController::class, "update"]);
    Route::delete("{task}", [TaskController::class, "destroy"]);
});
