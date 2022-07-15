<?php

use App\Http\Controllers\Api\CakeController;
use Illuminate\Support\Facades\Route;

Route::apiResource('cakes', CakeController::class);
