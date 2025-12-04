<!DOCTYPE html>
<html lang="de">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>@yield('title', 'LibraryManager')</title>
    <link rel="stylesheet" href="{{ asset('css/style.css') }}">
</head>
<body>
    <header class= "page-header">
        <h1 class="page-title">LibraryManager</h1>
        <nav class="page-nav">
                <a href="{{ route('library.welcome') }}">Willkommen</a>
                <a href="{{ route('library.team') }}">Team</a>
                <a href="{{ route('library.contact') }}">Kontakt</a>
                <a href="{{ route('books') }}">Bücher</a>
        </nav>
    </header>
    <main>
        <div class="card">@yield('content')</div>
    </main>
    <footer class="page-footer">
        &copy; {{ date('Y') }} LibraryManager
    </footer>
</body>
</html>
