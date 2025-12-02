<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\AboutController;


Route::get('/', function () {
    return view('welcome');
});


Route::get('/hello', function(){
    return 'Hello, Laravel!';
});

Route::get('/', [HomeController::class, 'index'])->name('home');

Route::get('/about', [AboutController::class, 'index'])->name('about');