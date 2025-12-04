@extends('layouts.app')

@section('title', 'Startseite')

@section('content')
    <h2>Infos über {{ $student->firstname }} {{ $student->lastname }}</h2>
    
    
      <p>
          Marticel Number: <strong>{{ $student->marticel_number }}</strong><br>
          Status:
          <span style="background-color: {{ $student->active ? '#d4edda' : '#f8d7da' }}; padding: 4px 8px;">
            {{ $student->active ? 'Aktiv' : 'Inaktiv' }}
          </span><br>
        E-Mail-Adresse: <strong>{{ $student->email }}</strong><br>
        Alter: <strong>{{ $student->age }}</strong><br>
        angelegt am: <strong>{{ $student->created_at }}</strong><br>
        geändert am: <strong>{{ $student->updated_at }}</strong><br>
      </p>
      <p>
        {{ $student->firstname }} {{ $student->lastname }}:<br>
        <a class="btn btn-primary" href="/students/{{ $student->id }}/edit">ändern</a>
        <form action="/students/{{ $student->id }}" method="post">
          @csrf
          @method('DELETE')
          <button type="submit" class="btn btn-danger">Löschen</button>
        </form>
      </p>
    
@endsection