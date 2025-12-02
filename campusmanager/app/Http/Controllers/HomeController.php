<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class HomeController extends Controller
{
    public function index()
    {
        $headline = 'Erste Übung mit Laravel';
        $today = now()->format('d.m.Y');

        /**
         * Ruft die View home.blade.php auf und übergibt Variableninhalte
         */
        return view('home', [
            'headline' => $headline,
            'today' => $today]);

    
    }
}
