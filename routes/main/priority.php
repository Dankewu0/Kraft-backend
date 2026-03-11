<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\PriorityController;

Route::prefix("priority")->group(function () {
    Route::get("/", [PriorityController::class, "index"]);
    Route::post("/", [PriorityController::class, "store"]);
    Route::put("{priority}", [PriorityController::class, "update"]);
    Route::delete("{priority}", [PriorityController::class, "destroy"]);
});
