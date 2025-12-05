{{--
    Diese View zeigt eine Liste aller Bücher an.
    Sie wird von einem Controller mit der Variable $books aufgerufen.
--}}

@extends('layouts.app') {{-- Verwendet das Layout aus resources/views/layouts/app.blade.php --}}

@section('title', 'Books') {{-- Setzt den Seitentitel --}}

@section('content') {{-- Start des Inhaltsbereichs --}}


<form action="/books" method="GET" style="margin-bottom: 20px;">
	<input
		type="text"
		name="q"
		placeholder="Suche nach Titel oder Autor"
		value="{{ $q ?? '' }}"
	>
	<button type="submit">Suchen</button>
</form>


<h1>LibraryManager – Bücherliste</h1>

<ul class="book-list">
    @foreach ($books as $book)
        <li class="book-item">
            <strong>{{ $book->title }}</strong> – {{ $book->author }} ({{ $book->published_year }})
            {{-- Hier könnten noch Links für Bearbeiten/Löschen stehen --}}
        </li>
    @endforeach
</ul>
@endsection
