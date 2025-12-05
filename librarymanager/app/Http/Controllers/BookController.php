<?php

namespace App\Http\Controllers;

use App\Models\Book;
use Illuminate\Http\Request;

class BookController extends Controller
{
    public function index(Request $request)
    {
        $query = Book::query();

        if ($request->filled('q')) {
            $q = $request->input('q');
            $query->where(function ($sub) use ($q) {
                $sub->where('title', 'like', '%' . $q . '%')
                    ->orWhere('author', 'like', '%' . $q . '%')
                    ->orWhere('isbn', 'like', '%' . $q . '%')
                    ->orWhere('published_year', 'like', '%' . $q . '%')
                    ->orWhere('category', 'like', '%' . $q . '%');
            });
        }

        $books = $query->orderBy('title')->paginate(5)->withQueryString();

        return view('books.index', [
            'books' => $books,
            'q' => $request->input('q')
        ]);
    }

    public function create()
    {
        return view('books.create');
    }

    public function store(Request $request)
    {
        $data = $request->validate([
            'title' => 'required|string|max:255',
            'author' => 'required|string|max:255',
            'isbn' => 'required|string|max:255',
            'published_year' => 'nullable|integer',
            'category' => 'nullable|string|max:255',
        ]);
        Book::create($data);
        return redirect()->route('books.index')->with('success', 'Buch wurde angelegt');
    }

    public function show(Book $book)
    {
        return view('books.show', compact('book'));
    }

    public function edit(Book $book)
    {
        return view('books.edit', compact('book'));
    }

    public function update(Request $request, Book $book)
    {
        $data = $request->validate([
            'title' => 'required|string|max:255',
            'author' => 'required|string|max:255',
            'isbn' => 'required|string|max:255',
            'published_year' => 'nullable|integer',
            'category' => 'nullable|string|max:255',
        ]);
        $book->update($data);
        return redirect()->route('books.index')->with('success', 'Buch wurde aktualisiert');
    }

    public function destroy(Book $book)
    {
        $book->delete();
        return redirect()->route('books.index')->with('success', 'Buch wurde gelöscht');
    }
}
