<?php

use Illuminate\Support\Str;

// Diese Konfigurationsdatei regelt das Caching in Laravel.
// Hier werden der Standard-Cache-Treiber, die verfügbaren Cache-Stores und das Präfix für Cache-Keys festgelegt.
// Die Werte werden meist aus der .env-Datei gelesen, können aber auch direkt hier gesetzt werden.

return [

    // Standard-Cache-Store, der verwendet wird, wenn kein anderer explizit angegeben ist.
    // Mögliche Werte: 'file', 'database', 'redis', 'array', etc.
    'default' => env('CACHE_STORE', 'database'),

    // Hier werden alle verfügbaren Cache-Stores definiert.
    // Ein Store ist eine konkrete Implementierung, wie und wo Daten zwischengespeichert werden.
    // Es können mehrere Stores für verschiedene Zwecke angelegt werden.
    'stores' => [

        // Cache im Arbeitsspeicher (nur für die aktuelle Anfrage, nicht persistent)
        'array' => [
            'driver' => 'array',
            'serialize' => false,
        ],

        // Cache in der Datenbank (Tabelle 'cache')
        'database' => [
            'driver' => 'database',
            'connection' => env('DB_CACHE_CONNECTION'),
            'table' => env('DB_CACHE_TABLE', 'cache'),
            'lock_connection' => env('DB_CACHE_LOCK_CONNECTION'),
            'lock_table' => env('DB_CACHE_LOCK_TABLE'),
        ],

        // Cache als Datei im Dateisystem
        'file' => [
            'driver' => 'file',
            'path' => storage_path('framework/cache/data'),
            'lock_path' => storage_path('framework/cache/data'),
        ],

        // Cache mit Memcached (verteiltes In-Memory-Caching)
        'memcached' => [
            'driver' => 'memcached',
            'persistent_id' => env('MEMCACHED_PERSISTENT_ID'),
            'sasl' => [
                env('MEMCACHED_USERNAME'),
                env('MEMCACHED_PASSWORD'),
            ],
            'options' => [
                // Memcached::OPT_CONNECT_TIMEOUT => 2000,
            ],
            'servers' => [
                [
                    'host' => env('MEMCACHED_HOST', '127.0.0.1'),
                    'port' => env('MEMCACHED_PORT', 11211),
                    'weight' => 100,
                ],
            ],
        ],

        // Cache mit Redis (verteiltes In-Memory-Caching)
        'redis' => [
            'driver' => 'redis',
            'connection' => env('REDIS_CACHE_CONNECTION', 'cache'),
            'lock_connection' => env('REDIS_CACHE_LOCK_CONNECTION', 'default'),
        ],

        // Cache mit DynamoDB (Cloud-Lösung von AWS)
        'dynamodb' => [
            'driver' => 'dynamodb',
            'key' => env('AWS_ACCESS_KEY_ID'),
            'secret' => env('AWS_SECRET_ACCESS_KEY'),
            'region' => env('AWS_DEFAULT_REGION', 'us-east-1'),
            'table' => env('DYNAMODB_CACHE_TABLE', 'cache'),
            'endpoint' => env('DYNAMODB_ENDPOINT'),
        ],

        // Cache für Laravel Octane (Performance-Optimierung)
        'octane' => [
            'driver' => 'octane',
        ],

        // Failover-Cache: Wenn der erste Store nicht verfügbar ist, wird der nächste verwendet.
        'failover' => [
            'driver' => 'failover',
            'stores' => [
                'database',
                'array',
            ],
        ],

    ],

    // Präfix für alle Cache-Keys, um Kollisionen mit anderen Anwendungen zu vermeiden.
    'prefix' => env('CACHE_PREFIX', Str::slug((string) env('APP_NAME', 'laravel')).'-cache-'),

];
