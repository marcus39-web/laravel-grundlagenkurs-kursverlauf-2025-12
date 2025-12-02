<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class AboutController extends Controller
{
    public function index()
    {
        $headline = 'Vielleicht klappt es noch!!!';
        $today = now()->format('d.m.Y');

        /**
         * Ruft die View home.blade.php auf und übergibt Variableninhalte
         */
        return view('about', [
            'headline' => $headline,
            'today' => $today]);

    
    }
}
