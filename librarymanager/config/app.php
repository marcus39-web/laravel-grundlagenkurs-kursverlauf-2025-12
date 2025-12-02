<?php

// Diese Konfigurationsdatei legt die zentralen Einstellungen für die Laravel-Anwendung fest.
// Hier werden u.a. Name, Umgebung, Debug-Modus, Zeitzone, Sprache, Verschlüsselung und Wartungsmodus definiert.
// Die Werte werden meist aus der .env-Datei gelesen, können aber auch direkt hier gesetzt werden.

return [

    // Name der Anwendung, z.B. für Benachrichtigungen oder die Anzeige im UI.
    'name' => env('APP_NAME', 'Laravel'),

    // Umgebung, in der die Anwendung läuft (z.B. 'local', 'production').
    // Dies beeinflusst z.B. das Logging und die Fehlerausgabe.
    'env' => env('APP_ENV', 'production'),

    // Debug-Modus: Bei true werden detaillierte Fehlermeldungen angezeigt.
    // Im Produktivbetrieb sollte dies immer false sein!
    'debug' => (bool) env('APP_DEBUG', false),

    // Basis-URL der Anwendung, z.B. für die Generierung von Links in Artisan-Befehlen.
    'url' => env('APP_URL', 'http://localhost'),

    // Zeitzone, die für Datums- und Zeitfunktionen verwendet wird.
    'timezone' => 'UTC',

    // Standardsprache der Anwendung (z.B. 'de' für Deutsch, 'en' für Englisch).
    'locale' => env('APP_LOCALE', 'en'),

    // Fallback-Sprache, falls eine Übersetzung nicht gefunden wird.
    'fallback_locale' => env('APP_FALLBACK_LOCALE', 'en'),

    // Sprache für Faker (Testdaten-Generator).
    'faker_locale' => env('APP_FAKER_LOCALE', 'en_US'),

    // Verschlüsselungsalgorithmus für sensible Daten.
    'cipher' => 'AES-256-CBC',

    // Schlüssel für die Verschlüsselung (muss 32 Zeichen lang sein).
    'key' => env('APP_KEY'),

    // Frühere Schlüssel für die Entschlüsselung alter Daten (z.B. nach Schlüsselwechsel).
    'previous_keys' => [
        ...array_filter(
            explode(',', (string) env('APP_PREVIOUS_KEYS', ''))
        ),
    ],

    // Einstellungen für den Wartungsmodus (z.B. für Updates oder Wartungsarbeiten).
    // Der Treiber 'file' speichert den Status lokal, 'cache' verteilt ihn über mehrere Server.
    'maintenance' => [
        'driver' => env('APP_MAINTENANCE_DRIVER', 'file'),
        'store' => env('APP_MAINTENANCE_STORE', 'database'),
    ],

];
