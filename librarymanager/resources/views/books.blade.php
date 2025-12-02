@extends('layouts.app')
@section('title', 'Books')
@section('content')

<h2>Bücherliste</h2>
<table border="1" cellpadding="8" style="margin-top:20px;">
	<thead>
		<tr>
			<th>Titel</th>
			<th>Autor</th>
			<th>ISBN</th>
			<th>Erscheinungsjahr</th>
			<th>Kategorie</th>
		</tr>
	</thead>
	<tbody>
		@foreach($books as $book)
			<tr>
				<td>{{ $book->title }}</td>
				<td>{{ $book->author }}</td>
				<td>{{ $book->isbn }}</td>
				<td>{{ $book->published_year }}</td>
				<td>{{ $book->category }}</td>
			</tr>
		@endforeach
	</tbody>
</table>
@endsection
