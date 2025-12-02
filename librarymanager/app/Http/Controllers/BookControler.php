<?php

namespace App\Http\Controllers;

// Importiert das Request-Objekt (wird hier nicht genutzt, aber oft Standard)
use Illuminate\Http\Request;

// Controller für die Bücherverwaltung (Einzelansicht)
// Diese Klasse steuert die Anzeige und Logik für die Einzelansicht der Bücherverwaltung
class BookControler extends Controller
{
    // Die index-Methode wird aufgerufen, wenn die zugehörige Route angesprochen wird
    // Sie bereitet die Daten für die View auf und gibt sie an die books-View weiter
    public function index()
    {
        // Überschrift für die View
        $headline = 'Bücherverwaltung';
        // Aktuelles Datum im Format TT.MM.JJJJ
        $today = now()->format('d.m.Y');

        /**
         * Gibt die View books.blade.php zurück und übergibt die Variablen headline und today
         *
         * - 'headline': Überschrift für die Seite
         * - 'today': aktuelles Datum
         */
        return view('books', [
            'headline' => $headline,
            'today' => $today
        ]);
    }
}
