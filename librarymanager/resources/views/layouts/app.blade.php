{{--
    Layout-Template für alle Seiten.
    Hier werden Header, Navigation, Footer und der Hauptbereich definiert.
    Einzelne Seiten werden mit @extends('layouts.app') eingebunden.
--}}

<!DOCTYPE html>
<html lang="de"> {{-- Spracheinstellung auf Deutsch --}}
<head>
    <meta charset="UTF-8"> {{-- Zeichencodierung --}}
    <meta name="viewport" content="width=device-width, initial-scale=1.0"> {{-- Responsives Design --}}
    <title>@yield('title', 'Librarymanager')</title> {{-- Titel, kann von Kind-Views überschrieben werden --}}
    <link rel="stylesheet" href="{{ asset('css/style.css') }}"> {{-- Einbindung der CSS-Datei --}}
</head>
<body>
    <div class="page"> {{-- Haupt-Container --}}
        <header class="page-header"> {{-- Kopfbereich --}}
            <h1 class="page-title">Libararymanager</h1> {{-- Hauptüberschrift --}}
            <p class="page-subtitle">Laravel-Grundlagenkurs</p> {{-- Untertitel --}}
            <nav class="page-nav"> {{-- Navigation --}}
                <a href="{{ route('books.index') }}">Books</a> {{-- Link zur Bücherliste --}}
                <a href="{{ route('users') }}" style="margin-left:10px;">Users</a> {{-- Link zur Userliste --}}
            </nav>
            <hr> {{-- Trennlinie --}}
        </header>
        <main>
            <div class="card">@yield('content')</div> {{-- Platz für den Seiteninhalt --}}
        </main>
        <footer class="page-footer"> {{-- Fußbereich --}}
            <hr>
            <small>@ {{ date('Y') }} Campusmanager</small> {{-- Copyright --}}
        </footer>
    </div>
</body>
</html>