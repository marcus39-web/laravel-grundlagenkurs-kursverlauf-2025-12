@extends('layouts.app')

@section('title', 'Buchdetails')

@section('content')
    <h2>Buchdetails</h2>
    <ul>
        <li><strong>Titel:</strong> {{ $book->title }}</li>
        <li><strong>Autor:</strong> {{ $book->author }}</li>
        <li><strong>ISBN:</strong> {{ $book->isbn }}</li>
        <li><strong>Erscheinungsjahr:</strong> {{ $book->published_year }}</li>
        <li><strong>Kategorie:</strong> {{ $book->category }}</li>
    </ul>
    <p>
        <a href="{{ route('books.index') }}">Zurück zur Liste</a> |
        <a href="{{ route('books.edit', $book) }}">Bearbeiten</a>
    </p>
@endsection
