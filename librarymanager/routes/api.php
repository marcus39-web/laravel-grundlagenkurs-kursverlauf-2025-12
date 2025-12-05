<?php

use Illuminate\Support\Facades\Route;

Route::apiResource('books', App\Http\Controllers\Api\BookApiController::class);
