<?php

// Diese Konfigurationsdatei regelt die Authentifizierung in Laravel.
// Hier werden die Standard-Authentifizierung, Guards, User-Provider und das Passwort-Reset-Verhalten festgelegt.
// Die Werte werden meist aus der .env-Datei gelesen, können aber auch direkt hier gesetzt werden.

return [

    // Standardwerte für Authentifizierung und Passwort-Reset.
    // 'guard' gibt an, wie Benutzer authentifiziert werden (z.B. 'web' für Session-basiert).
    // 'passwords' legt fest, welcher Passwort-Reset-Broker verwendet wird.
    'defaults' => [
        'guard' => env('AUTH_GUARD', 'web'),
        'passwords' => env('AUTH_PASSWORD_BROKER', 'users'),
    ],

    // Hier werden die verschiedenen Authentifizierungs-Guards definiert.
    // Ein Guard bestimmt, wie ein Benutzer authentifiziert wird (z.B. über Session oder API-Token).
    // Standardmäßig gibt es den 'web'-Guard, der Sessions verwendet.
    'guards' => [
        'web' => [
            'driver' => 'session',
            'provider' => 'users',
        ],
    ],

    // User-Provider definieren, wie Benutzer aus der Datenbank geladen werden.
    // Standard ist der Eloquent-Provider, der das User-Model verwendet.
    // Alternativ kann auch ein Datenbank-Provider (Tabelle) verwendet werden.
    'providers' => [
        'users' => [
            'driver' => 'eloquent',
            'model' => env('AUTH_MODEL', App\Models\User::class),
        ],

        // Beispiel für einen Datenbank-Provider (auskommentiert):
        // 'users' => [
        //     'driver' => 'database',
        //     'table' => 'users',
        // ],
    ],

    // Einstellungen für das Zurücksetzen von Passwörtern.
    // Hier wird z.B. die Tabelle für die Reset-Tokens und die Gültigkeitsdauer festgelegt.
    'passwords' => [
        'users' => [
            'provider' => 'users',
            'table' => env('AUTH_PASSWORD_RESET_TOKEN_TABLE', 'password_reset_tokens'),
            'expire' => 60, // Minuten, wie lange ein Reset-Token gültig ist
            'throttle' => 60, // Sekunden, wie oft ein Token angefordert werden darf
        ],
    ],

    // Timeout für Passwort-Bestätigungen (z.B. bei sensiblen Aktionen).
    // Nach Ablauf dieser Zeit (in Sekunden) muss das Passwort erneut eingegeben werden.
    'password_timeout' => env('AUTH_PASSWORD_TIMEOUT', 10800),

];
