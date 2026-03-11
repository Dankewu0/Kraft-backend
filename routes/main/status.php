<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\StatusController;
Route::prefix("status")->group(function () {
    Route::get("/", [StatusController::class, "index"]);
    Route::post("/", [StatusController::class, "store"]);
    Route::put("{status}", [StatusController::class, "update"]);
    Route::delete("{status}", [StatusController::class, "destroy"]);
});
