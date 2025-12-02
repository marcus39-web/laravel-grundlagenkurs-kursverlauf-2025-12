<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\BookControler;

Route::get('/', function () {
    return view('welcome');
});

Route::get('/hello', function(){
    return 'Hello, Laravel!';
});

Route::get('/books', [BookControler::class, 'index'])->name('books');