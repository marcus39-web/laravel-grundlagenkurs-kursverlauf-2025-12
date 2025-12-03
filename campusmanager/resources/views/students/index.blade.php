@extends('layouts.app')

@section('title', 'Studentenliste')

@section('content')

    <h2>Studentenliste</h2>

    @if(session('success'))
        <p class="callout success">{{ session('success') }}</p>
    @endif

    <p><a href="{{ route('students.create') }}">Neuen Studenten anlegen</a></p>

    @if($students->isEmpty())
        <p>Es sind noch keine Studenten vorhanden.</p>
    @else
        <table>
            <thead>
                <tr>
                    <th>#</th>
                    <th>Vorname</th>
                    <th>Nachname</th>
                    <th>Email</th>
                    <th>Aktion</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($students as $s)
                    <tr>
                        <td>{{ $s->id }}</td>
                        <td>{{ $s->firstname }}</td>
                        <td>{{ $s->lastname }}</td>
                        <td>{{ $s->email }}</td>
                        <td>
                            <p>
                                <a class="btn btn-primary" href="/students/{{ $s->id }}">Anzeigen</a>
                                <a class="btn btn-primary" href="/students/{{ $s->id }}/edit">Bearbeiten</a>
                            </p>
                            <form action="/students/{{ $s->id }}" method="post">
                                @csrf
                                @method('DELETE')
                                <button class="btn btn-danger" type="submit">Löschen</button>
                            </form>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    @endif

@endsection