<?php

use Illuminate\Support\Str;

return [

// Diese Konfigurationsdatei regelt das Session-Handling in Laravel.
// Hier werden der Standard-Session-Treiber, Lebensdauer, Speicherort und Cookie-Einstellungen definiert.
// Die Werte werden meist aus der .env-Datei gelesen, können aber auch direkt hier gesetzt werden.

    /*
    |--------------------------------------------------------------------------
    | Standard-Session-Treiber
    |--------------------------------------------------------------------------
    | Hier wird festgelegt, welcher Treiber für die Speicherung der Sessions verwendet wird.
    | Mögliche Werte: "file", "cookie", "database", "memcached", "redis", "dynamodb", "array"
    */
    'driver' => env('SESSION_DRIVER', 'database'),

    /*
    |--------------------------------------------------------------------------
    | Lebensdauer der Session (in Minuten)
    |--------------------------------------------------------------------------
    | Gibt an, wie lange eine Session gültig bleibt, bevor sie abläuft.
    */
    'lifetime' => (int) env('SESSION_LIFETIME', 120),

    /*
    |--------------------------------------------------------------------------
    | Ablauf bei Browser-Schließung
    |--------------------------------------------------------------------------
    | Wenn true, läuft die Session ab, sobald der Browser geschlossen wird.
    */
    'expire_on_close' => env('SESSION_EXPIRE_ON_CLOSE', false),

    /*
    |--------------------------------------------------------------------------
    | Verschlüsselung der Session-Daten
    |--------------------------------------------------------------------------
    | Wenn true, werden die Session-Daten verschlüsselt gespeichert.
    */
    'encrypt' => env('SESSION_ENCRYPT', false),

    /*
    |--------------------------------------------------------------------------
    | Speicherort für Session-Dateien
    |--------------------------------------------------------------------------
    | Nur relevant, wenn der Treiber auf "file" steht.
    */
    'files' => storage_path('framework/sessions'),

    /*
    |--------------------------------------------------------------------------
    | Datenbankverbindung für Sessions
    |--------------------------------------------------------------------------
    | Nur relevant für "database" oder "redis" als Treiber.
    */
    'connection' => env('SESSION_CONNECTION'),

    /*
    |--------------------------------------------------------------------------
    | Tabelle für Sessions
    |--------------------------------------------------------------------------
    | Nur relevant für den "database"-Treiber.
    */
    'table' => env('SESSION_TABLE', 'sessions'),

    /*
    |--------------------------------------------------------------------------
    | Cache-Store für Sessions
    |--------------------------------------------------------------------------
    | Nur relevant für Cache-basierte Treiber wie "redis" oder "memcached".
    */
    'store' => env('SESSION_STORE'),

    /*
    |--------------------------------------------------------------------------
    | Bereinigungs-Lotterie
    |--------------------------------------------------------------------------
    | Gibt die Wahrscheinlichkeit an, mit der alte Sessions bereinigt werden.
    | Beispiel: [2, 100] bedeutet 2% Wahrscheinlichkeit pro Anfrage.
    */
    'lottery' => [2, 100],

    /*
    |--------------------------------------------------------------------------
    | Name des Session-Cookies
    |--------------------------------------------------------------------------
    | Der Name des Cookies, das die Session-ID enthält.
    */
    'cookie' => env(
        'SESSION_COOKIE',
        Str::slug((string) env('APP_NAME', 'laravel')).'-session'
    ),

    /*
    |--------------------------------------------------------------------------
    | Gültiger Pfad für das Cookie
    |--------------------------------------------------------------------------
    | Gibt an, für welchen Pfad das Cookie gültig ist.
    */
    'path' => env('SESSION_PATH', '/'),

    /*
    |--------------------------------------------------------------------------
    | Gültige Domain für das Cookie
    |--------------------------------------------------------------------------
    | Gibt an, für welche Domain das Cookie gültig ist.
    */
    'domain' => env('SESSION_DOMAIN'),

    /*
    |--------------------------------------------------------------------------
    | Übertragung nur über HTTPS
    |--------------------------------------------------------------------------
    | Wenn true, wird das Cookie nur über HTTPS übertragen.
    */
    'secure' => env('SESSION_SECURE_COOKIE'),

    /*
    |--------------------------------------------------------------------------
    | HTTP Only
    |--------------------------------------------------------------------------
    | Wenn true, ist das Cookie nur über HTTP und nicht über JavaScript zugänglich.
    */
    'http_only' => env('SESSION_HTTP_ONLY', true),

    /*
    |--------------------------------------------------------------------------
    | Same-Site-Attribut
    |--------------------------------------------------------------------------
    | Steuert, wie Cookies bei Cross-Site-Anfragen gesendet werden.
    | Mögliche Werte: "lax", "strict", "none", null
    */
    'same_site' => env('SESSION_SAME_SITE', 'lax'),

    /*
    |--------------------------------------------------------------------------
    | Partitionierte Cookies
    |--------------------------------------------------------------------------
    | Aktiviert partitionierte Cookies für Cross-Site-Kontexte.
    */
    'partitioned' => env('SESSION_PARTITIONED_COOKIE', false),

];
