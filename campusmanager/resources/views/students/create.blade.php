@extends('layouts.app')

@section('title', 'Student anlegen')

@section('content')

<h2>Neuen Studenten anlegen</h2>
<p>Das Formuar bauen wir morgen - hier siehst Du nur den Platz, an dem es später steht</p>

<!-- <form action="{{ route('students.store') }}" method="POST">
    @csrf
    <div>
        <label for="firstname">Vorname:</label>
        <input type="text" id="firstname" name="firstname" required>
    </div>
    <div>
        <label for="lastname">Nachname:</label>
        <input type="text" id="lastname" name="lastname" required>
    </div>
    <div>
        <label for="email">Email:</label>
        <input type="email" id="email" name="email" required>
    </div>
    <button type="submit">Erstellen</button>
</form> -->

@endsection