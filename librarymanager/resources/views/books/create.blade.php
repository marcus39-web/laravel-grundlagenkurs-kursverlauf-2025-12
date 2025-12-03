@extends('layouts.app')

@section('title', 'Buch anlegen')

@section('content')
    <h2>Buch anlegen</h2>
    <form action="{{ route('books.store') }}" method="POST">
        @csrf
        <div>
            <label for="title">Titel:</label>
            <input type="text" name="title" id="title" value="{{ old('title') }}">
        </div>
        <div>
            <label for="author">Autor:</label>
            <input type="text" name="author" id="author" value="{{ old('author') }}">
        </div>
        <div>
            <label for="isbn">ISBN:</label>
            <input type="text" name="isbn" id="isbn" value="{{ old('isbn') }}">
        </div>
        <div>
            <label for="published_year">Erscheinungsjahr:</label>
            <input type="number" name="published_year" id="published_year" value="{{ old('published_year') }}">
        </div>
        <div>
            <label for="category">Kategorie:</label>
            <input type="text" name="category" id="category" value="{{ old('category') }}">
        </div>
        <button type="submit">Speichern</button>
    </form>
@endsection
