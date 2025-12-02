<?php

namespace App\Http\Controllers;

use App\Models\Book;
use Illuminate\Http\Request;

class BookListController extends Controller
{
    public function index()
    {
        // Bücher nach Titel sortieren
        $books = Book::orderBy('title')->get();
        return view('books.index', ['books' => $books]);
    }
}
