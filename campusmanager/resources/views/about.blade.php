@extends('layouts.app')

@section('title', 'About')

@section('content')

<h2>{{ $headline }}</h2>
<p>Heutiges Datum: {{ $today }}</p>
<!-- <p>Dies ist die erste Seite Deines Laravel-Projektes.</p> -->
<p>Erste Übung mit Laravel</p>
@endsection
