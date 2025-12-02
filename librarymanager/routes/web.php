<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\BookControler;

Route::get('/', function () {
    return view('welcome');
});

Route::get('/hello', function(){
    return 'Hello, Laravel!';
});


Route::get('/books', [App\Http\Controllers\BookListController::class, 'index'])->name('books');

Route::get('/users', function() {
    $users = App\Models\User::all();
    return view('users', ['users' => $users]);
})->name('users');