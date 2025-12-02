<?php

namespace App\Http\Controllers;

// Importiert das Book-Model, um auf die Bücher-Tabelle zuzugreifen
use App\Models\Book;

// Importiert das Request-Objekt (wird hier nicht genutzt, aber oft Standard)
use Illuminate\Http\Request;

// Der Controller für die Bücherliste
// Diese Klasse steuert die Anzeige und Logik für die Listenansicht aller Bücher
class BookListController extends Controller
{
    // Die index-Methode wird aufgerufen, wenn die Route /books aufgerufen wird
    // Sie holt alle Bücher aus der Datenbank und gibt sie an die View weiter
    public function index()
    {
        // Holt alle Bücher aus der Datenbank, sortiert nach Titel (aufsteigend)
        $books = Book::orderBy('title')->get();

        // Gibt die View 'books.index' zurück und übergibt die Bücher als Variable
        // Die Variable 'books' steht dann in der View zur Verfügung
        return view('books.index', [
            'books' => $books
        ]);
    }
}
