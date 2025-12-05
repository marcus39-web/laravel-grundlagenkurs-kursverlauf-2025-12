<?php

// Importiert die Route-Fassade, um Routing-Funktionen zu nutzen
use Illuminate\Support\Facades\Route;

// Importiert einen Beispiel-Controller (wird hier nicht direkt verwendet, aber oft Standard)
use App\Http\Controllers\BookControler;

// Importiert einen weiteren Controller für die Resource-Routes
use App\Http\Controllers\BookController;

// -----------------------------
// Definiert die Startseite ("/")
// -----------------------------
// Wenn ein Benutzer die Root-URL aufruft, wird die View "welcome" zurückgegeben.
// Das ist die Standard-Startseite von Laravel.
Route::get('/', [BookController::class, 'index']);

// -----------------------------------
// Beispielroute für einen einfachen Text
// -----------------------------------
// Wenn /hello aufgerufen wird, gibt die Route einfach einen Text zurück.
Route::get('/hello', function(){
    return 'Hello, Laravel!';
});

// -----------------------------------
// Route für die Bücherliste
// -----------------------------------
// Diese Route ruft die Methode "index" des BookListController auf.
// Sie gibt die Bücherliste aus der Datenbank an die View weiter.
// Erreichbar unter /books, interner Name: "books" (für z.B. route('books'))
Route::get('/books', [App\Http\Controllers\BookListController::class, 'index'])->name('books');

// -----------------------------------
// Route für die Benutzerliste
// -----------------------------------
// Holt alle User aus der Datenbank und gibt sie an die View "users" weiter.
// Erreichbar unter /users, interner Name: "users"
Route::get('/users', function() {
    // Holt alle User-Modelle aus der Datenbank
    $users = App\Models\User::all();
    // Gibt die User an die View "users" weiter
    return view('users', ['users' => $users]);
})->name('users');

// -----------------------------------
// Resource-Routes für Bücher
// -----------------------------------
// Registriert die Resource-Routes für den BookController
Route::resource('books', BookController::class);

