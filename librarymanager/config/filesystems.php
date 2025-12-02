<?php

// Diese Konfigurationsdatei regelt die Dateispeicherung in Laravel.
// Hier werden der Standard-Speicherort (Disk), alle verfügbaren Disks und symbolische Links definiert.
// Die Werte werden meist aus der .env-Datei gelesen, können aber auch direkt hier gesetzt werden.

return [

    // Standard-Dateisystem (Disk), das für Dateioperationen verwendet wird.
    // Mögliche Werte: 'local', 'public', 's3', etc.
    'default' => env('FILESYSTEM_DISK', 'local'),

    // Hier werden alle verfügbaren Disks definiert.
    // Eine Disk ist eine konkrete Implementierung, wie und wo Dateien gespeichert werden (z.B. lokal, S3, FTP).
    // Es können mehrere Disks für verschiedene Zwecke angelegt werden.
    'disks' => [
        // Lokale Speicherung im privaten Bereich (nicht öffentlich zugänglich)
        'local' => [
            'driver' => 'local',
            'root' => storage_path('app/private'),
            'serve' => true,
            'throw' => false,
            'report' => false,
        ],

        // Lokale Speicherung im öffentlichen Bereich (öffentlich zugänglich über /storage)
        'public' => [
            'driver' => 'local',
            'root' => storage_path('app/public'),
            'url' => env('APP_URL').'/storage',
            'visibility' => 'public',
            'throw' => false,
            'report' => false,
        ],

        // Speicherung in der Cloud mit Amazon S3
        's3' => [
            'driver' => 's3',
            'key' => env('AWS_ACCESS_KEY_ID'),
            'secret' => env('AWS_SECRET_ACCESS_KEY'),
            'region' => env('AWS_DEFAULT_REGION'),
            'bucket' => env('AWS_BUCKET'),
            'url' => env('AWS_URL'),
            'endpoint' => env('AWS_ENDPOINT'),
            'use_path_style_endpoint' => env('AWS_USE_PATH_STYLE_ENDPOINT', false),
            'throw' => false,
            'report' => false,
        ],
    ],

    // Symbolische Links, die beim Ausführen von 'php artisan storage:link' erstellt werden.
    // Die Schlüssel sind die Link-Pfade, die Werte die Zielverzeichnisse.
    'links' => [
        public_path('storage') => storage_path('app/public'),
    ],

];
