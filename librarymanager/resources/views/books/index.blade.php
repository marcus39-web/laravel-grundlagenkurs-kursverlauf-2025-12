{{--
    Diese View zeigt eine Liste aller Bücher an.
    Sie wird von BookListController@index mit der Variable $books aufgerufen.
--}}

@extends('layouts.app') {{-- Verwendet das Layout aus resources/views/layouts/app.blade.php --}}

@section('title', 'Bücherliste') {{-- Setzt den Seitentitel --}}

@section('content') {{-- Start des Inhaltsbereichs --}}
<h2>Bücherliste</h2>

{{-- Prüft, ob die Bücherliste leer ist --}}
@if($books->isEmpty())
    <p>Es sind keine Bücher vorhanden.</p>
@else
    {{-- Tabelle mit allen Büchern --}}
    <table border="1" cellpadding="8" style="margin-top:20px;">
        <thead>
            <tr>
                <th>Titel</th> {{-- Spalte für den Buchtitel --}}
                <th>Autor</th> {{-- Spalte für den Autor --}}
                <th>ISBN</th> {{-- Spalte für die ISBN --}}
                <th>Erscheinungsjahr</th> {{-- Spalte für das Jahr --}}
                <th>Kategorie</th> {{-- Spalte für die Kategorie --}}
            </tr>
        </thead>
        <tbody>
            {{-- Schleife über alle Bücher --}}
            @foreach($books as $book)
                <tr>
                    <td>{{ $book->title }}</td> {{-- Buchtitel --}}
                    <td>{{ $book->author }}</td> {{-- Autor --}}
                    <td>{{ $book->isbn }}</td> {{-- ISBN --}}
                    <td>{{ $book->published_year }}</td> {{-- Erscheinungsjahr --}}
                    <td>{{ $book->category }}</td> {{-- Kategorie --}}
                </tr>
            @endforeach
        </tbody>
    </table>
@endif
@endsection
