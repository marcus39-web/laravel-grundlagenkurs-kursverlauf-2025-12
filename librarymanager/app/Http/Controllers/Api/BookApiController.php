<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;

use Illuminate\Http\Request;
use App\Models\Book;

class BookApiController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
    {
        $query = Book::query();

        // Einfache Suche nach Titel oder Autor
        if ($search = $request->input('search')) {
            $query->where('title', 'like', "%{$search}%")
                  ->orWhere('author', 'like', "%{$search}%");
        }

        // Pagination (z.B. 10 Bücher pro Seite)
        $books = $query->orderBy('title')->paginate(10);

        return response()->json([
            'success' => true,
            'data' => $books
        ]);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $validated = $request->validate([
            'title' => 'required|string|max:255',
            'author' => 'required|string|max:255',
            'isbn' => 'nullable|string|max:20',
            'published_year' => 'nullable|integer',
            'category' => 'nullable|string|max:100',
        ]);

        $book = Book::create($validated);
        return response()->json([
            'success' => true,
            'data' => $book
        ], 201);
    }

    /**
     * Display the specified resource.
     */
    public function show($id)
    {
        $book = Book::findOrFail($id);
        return response()->json([
            'success' => true,
            'data' => $book
        ]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, $id)
    {
        $validated = $request->validate([
            'title' => 'required|string|max:255',
            'author' => 'required|string|max:255',
            'isbn' => 'nullable|string|max:20',
            'published_year' => 'nullable|integer',
            'category' => 'nullable|string|max:100',
        ]);

        $book = Book::findOrFail($id);
        $book->update($validated);
        return response()->json([
            'success' => true,
            'data' => $book
        ]);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
    {
        $book = Book::findOrFail($id);
        $book->delete();
        return response()->json([
            'success' => true,
            'data' => null,
            'message' => 'Buch gelöscht'
        ]);
    }
}
