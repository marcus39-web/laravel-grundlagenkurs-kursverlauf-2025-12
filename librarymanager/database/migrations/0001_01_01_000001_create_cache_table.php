<?php

// Diese Migrationsdatei ist dafür zuständig, die Tabellen für das Caching-System von Laravel anzulegen.
// Sie erstellt zwei Tabellen: 'cache' für die Speicherung von Cache-Einträgen und 'cache_locks' für Sperren (Locks),
// die z.B. bei parallelen Zugriffen auf Ressourcen verwendet werden.
//
// Migrationen dienen dazu, die Datenbankstruktur (Tabellen, Spalten, Indizes) zu versionieren und zu verwalten.
// Die Methoden 'up' und 'down' definieren, wie die Migration angewendet bzw. zurückgerollt wird.

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;


return new class extends Migration
{
    /**
     * Führt die Migration aus und legt die benötigten Tabellen an.
     *
     * Die Methode 'up' wird beim Ausführen von 'php artisan migrate' aufgerufen.
     */
    public function up(): void
    {
        // Erstellt die Tabelle 'cache', in der Cache-Einträge gespeichert werden.
        // Jeder Eintrag besteht aus einem eindeutigen Schlüssel ('key'), dem Wert ('value') und dem Ablaufzeitpunkt ('expiration').
        Schema::create('cache', function (Blueprint $table) {
            $table->string('key')->primary(); // Primärschlüssel: Eindeutiger Bezeichner für den Cache-Eintrag
            $table->mediumText('value');      // Der eigentliche Wert, der im Cache gespeichert wird (z.B. serialisierte Daten)
            $table->integer('expiration');    // Zeitstempel, wann der Eintrag abläuft (Unix-Timestamp)
        });

        // Erstellt die Tabelle 'cache_locks', die für Sperren (Locks) im Cache-System verwendet wird.
        // Dies ist z.B. wichtig, um Race-Conditions bei parallelen Zugriffen zu vermeiden.
        Schema::create('cache_locks', function (Blueprint $table) {
            $table->string('key')->primary(); // Primärschlüssel: Eindeutiger Bezeichner für die Sperre
            $table->string('owner');          // Besitzer der Sperre (z.B. Prozess-ID oder eindeutiger Token)
            $table->integer('expiration');    // Zeitstempel, wann die Sperre abläuft (Unix-Timestamp)
        });
    }

    /**
     * Macht die Migration rückgängig, indem die Tabellen wieder gelöscht werden.
     *
     * Die Methode 'down' wird beim Ausführen von 'php artisan migrate:rollback' aufgerufen.
     */
    public function down(): void
    {
        // Löscht die Tabelle 'cache', falls sie existiert.
        Schema::dropIfExists('cache');
        // Löscht die Tabelle 'cache_locks', falls sie existiert.
        Schema::dropIfExists('cache_locks');
    }
};
