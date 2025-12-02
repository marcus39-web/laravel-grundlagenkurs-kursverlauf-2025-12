<?php
namespace App\Http\Controllers;

// Die abstrakte Basisklasse Controller dient als Ausgangspunkt für alle Controller in Laravel.
// Sie stellt eine gemeinsame Basis bereit, von der alle eigenen Controller erben.
// In Laravel können hier z.B. gemeinsame Methoden, Middleware oder Hilfsfunktionen für alle Controller definiert werden.
//
// Da diese Klasse abstrakt ist, kann sie nicht direkt instanziiert werden.
// Eigene Controller (z.B. BookController) erben von dieser Klasse und können so gemeinsame Funktionalität nutzen.

abstract class Controller
{
    // Hier könnten gemeinsame Methoden für alle Controller definiert werden.
    // Aktuell ist die Klasse leer und dient nur als Basis.
}
