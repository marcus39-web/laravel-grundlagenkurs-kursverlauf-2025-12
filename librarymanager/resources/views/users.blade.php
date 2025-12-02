@extends('layouts.app')
@section('title', 'Userliste')
@section('content')
<h2>Userliste</h2>
@if($users->isEmpty())
    <p>Es sind keine User vorhanden.</p>
@else
    <table border="1" cellpadding="8" style="margin-top:20px;">
        <thead>
            <tr>
                <th>Name</th>
                <th>Email</th>
            </tr>
        </thead>
        <tbody>
            @foreach($users as $user)
                <tr>
                    <td>{{ $user->name }}</td>
                    <td>{{ $user->email }}</td>
                </tr>
            @endforeach
        </tbody>
    </table>
@endif
@endsection
