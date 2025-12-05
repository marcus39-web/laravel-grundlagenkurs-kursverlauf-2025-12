{{--
    Diese View zeigt eine Liste aller Bücher an.
    Sie wird von BookListController@index mit der Variable $books aufgerufen.
--}}

@extends('layouts.app') {{-- Verwendet das Layout aus resources/views/layouts/app.blade.php --}}

@section('title', 'Bücherliste') {{-- Setzt den Seitentitel --}}

@section('content') {{-- Start des Inhaltsbereichs --}}

<form action="/books" method="GET" class="search-form">
    <label for="q" style="font-weight: bold;">Suche:</label>
    <input
        type="text"
        id="q"
        name="q"
        placeholder="Titel, Autor, ISBN, Jahr, Kategorie..."
        value="{{ $q ?? '' }}"
    >
    <button type="submit">Suchen</button>
</form>

<h2>Bücherliste</h2>
<a href="{{ route('books.create') }}" class="btn btn-primary" style="margin-bottom:15px;">Buch anlegen</a>

{{-- Prüft, ob die Bücherliste leer ist --}}
@if($books->isEmpty())
    <p>Es sind keine Bücher vorhanden.</p>
@else
    <ul class="book-list">
        @foreach ($books as $book)
            <li class="book-item">
                <strong>{{ $book->title }}</strong> – {{ $book->author }} ({{ $book->published_year }})<br>
                <span>ISBN: {{ $book->isbn }} | Kategorie: {{ $book->category }}</span><br>
                <a href="{{ route('books.show', $book) }}">Details</a> |
                <a href="{{ route('books.edit', $book) }}">Bearbeiten</a>
            </li>
        @endforeach
    </ul>
@endif

{{-- Paginierung anzeigen --}}
<div style="margin-top: 20px;">
    {{ $books->links() }}
</div>
@endsection
