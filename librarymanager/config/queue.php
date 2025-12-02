<?php

return [

    /*
    |--------------------------------------------------------------------------
    | Default Queue Connection Name
    |--------------------------------------------------------------------------
    |
    | Laravel's queue supports a variety of backends via a single, unified
    | API, giving you convenient access to each backend using identical
    | syntax for each. The default queue connection is defined below.
    |
    */

    'default' => env('QUEUE_CONNECTION', 'database'),

    /*
    |--------------------------------------------------------------------------
    | Queue Connections
    |--------------------------------------------------------------------------
    |
    | Here you may configure the connection options for every queue backend
    | used by your application. An example configuration is provided for
    | each backend supported by Laravel. You're also free to add more.
    |
    | Drivers: "sync", "database", "beanstalkd", "sqs", "redis",
    |          "deferred", "background", "failover", "null"
    |
    */

    'connections' => [

        'sync' => [
            'driver' => 'sync',
        ],

        // Datenbank-Queue-Verbindung
        'database' => [
            'driver' => 'database',
            'connection' => env('DB_QUEUE_CONNECTION'), // Datenbankverbindung für die Queue
            'table' => env('DB_QUEUE_TABLE', 'jobs'),   // Tabelle für Jobs
            'queue' => env('DB_QUEUE', 'default'),      // Name der Queue
            'retry_after' => (int) env('DB_QUEUE_RETRY_AFTER', 90), // Sekunden bis zum erneuten Versuch
            'after_commit' => false,                    // Job erst nach Commit ausführen?
        ],
    ],

    // Einstellungen für fehlgeschlagene Jobs (Fehlerbehandlung und Logging)
    'failed' => [
        'driver' => env('QUEUE_FAILED_DRIVER', 'database-uuids'),
        'database' => env('DB_CONNECTION', 'sqlite'),
        'table' => 'failed_jobs',
    ],

];
