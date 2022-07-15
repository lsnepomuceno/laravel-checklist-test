<?php

use App\Http\Controllers\Api\{CakeController, InterestController};
use Illuminate\Support\Facades\Route;

Route::apiResource('cakes', CakeController::class);
Route::apiResource('interests', InterestController::class);
