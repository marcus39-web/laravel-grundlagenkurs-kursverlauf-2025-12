{{--
    Diese View zeigt eine Liste aller User an.
    Sie wird von einer Route mit der Variable $users aufgerufen.
--}}

@extends('layouts.app') {{-- Verwendet das Layout aus resources/views/layouts/app.blade.php --}}

@section('title', 'Userliste') {{-- Setzt den Seitentitel --}}

@section('content') {{-- Start des Inhaltsbereichs --}}
<h2>Userliste</h2> {{-- Überschrift --}}

@if($users->isEmpty()) {{-- Prüft, ob die Userliste leer ist --}}
    <p>Es sind keine User vorhanden.</p>
@else
    {{-- Tabelle mit allen Usern --}}
    <table border="1" cellpadding="8" style="margin-top:20px;">
        <thead>
            <tr>
                <th>Name</th> {{-- Spalte für den Namen --}}
                <th>Email</th> {{-- Spalte für die E-Mail-Adresse --}}
            </tr>
        </thead>
        <tbody>
            {{-- Schleife über alle User --}}
            @foreach($users as $user)
                <tr>
                    <td>{{ $user->name }}</td> {{-- Name --}}
                    <td>{{ $user->email }}</td> {{-- E-Mail-Adresse --}}
                </tr>
            @endforeach
        </tbody>
    </table>
@endif
@endsection
