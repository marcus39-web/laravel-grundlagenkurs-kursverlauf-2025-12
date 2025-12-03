<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class HomeController extends Controller
{
    public function index()
    {
        $headline = 'Willkommen im Campusmanager';
        $today = now()->format('d.m.Y');

        /**
         * Ruft die View home.blade.php auf und übergibt Variableninhalte
         */
        return view('home', [
            'headline'  => $headline,
            'heute'     => $today
        ]);
    }

    public function about() {
        $headline = 'Über diesen Kurs';

        return view('about', [
            'headline'  => $headline,
        ]);
    }
}