<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class BookControler extends Controller
{
    public function index()
    {
        $headline = 'Bücherverwaltung';
        $today = now()->format('d.m.Y');

        /**
         * Ruft die View books.blade.php auf und übergibt Variableninhalte
         */
        return view('books', [
            'headline' => $headline,
            'today' => $today]);
    }
}
