<?php

// Diese Migrationsdatei legt die Tabellen für das Queue-System von Laravel an.
// Sie erstellt die Tabellen 'jobs', 'job_batches' und 'failed_jobs', die für die Verwaltung von Hintergrundaufgaben (Jobs) benötigt werden.
//
// Das Queue-System ermöglicht es, zeitaufwändige Aufgaben (wie E-Mails, Exporte, etc.) asynchron im Hintergrund abzuarbeiten.
// Migrationen dienen dazu, die Datenbankstruktur zu versionieren und zu verwalten.

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;


return new class extends Migration
{
    /**
     * Führt die Migration aus und legt die benötigten Tabellen für das Queue-System an.
     *
     * Die Methode 'up' wird beim Ausführen von 'php artisan migrate' aufgerufen.
     */
    public function up(): void
    {
        // Erstellt die Tabelle 'jobs', in der alle zu verarbeitenden Hintergrundaufgaben gespeichert werden.
        // Jede Zeile repräsentiert einen einzelnen Job, der von einem Worker abgearbeitet werden kann.
        Schema::create('jobs', function (Blueprint $table) {
            $table->id();                        // Eindeutige ID für jeden Job (Primärschlüssel)
            $table->string('queue')->index();    // Name der Queue, in der der Job liegt (z.B. 'default')
            $table->longText('payload');         // Die eigentlichen Job-Daten (z.B. serialisierte Informationen)
            $table->unsignedTinyInteger('attempts'); // Anzahl der bisherigen Versuche, den Job auszuführen
            $table->unsignedInteger('reserved_at')->nullable(); // Zeitstempel, wann der Job reserviert wurde (null, wenn noch nicht reserviert)
            $table->unsignedInteger('available_at'); // Zeitstempel, ab wann der Job verfügbar ist
            $table->unsignedInteger('created_at');   // Zeitstempel, wann der Job erstellt wurde
        });

        // Erstellt die Tabelle 'job_batches', die für die Verwaltung von Job-Batches (Sammelaufträgen) genutzt wird.
        // Damit können mehrere Jobs als Gruppe verwaltet und überwacht werden.
        Schema::create('job_batches', function (Blueprint $table) {
            $table->string('id')->primary();         // Eindeutige ID für den Batch (Primärschlüssel)
            $table->string('name');                  // Name des Batches
            $table->integer('total_jobs');           // Gesamtanzahl der Jobs im Batch
            $table->integer('pending_jobs');         // Anzahl der noch ausstehenden Jobs
            $table->integer('failed_jobs');          // Anzahl der fehlgeschlagenen Jobs
            $table->longText('failed_job_ids');      // IDs der fehlgeschlagenen Jobs (als Text gespeichert)
            $table->mediumText('options')->nullable(); // Zusätzliche Optionen (z.B. Einstellungen für den Batch)
            $table->integer('cancelled_at')->nullable(); // Zeitstempel, wann der Batch abgebrochen wurde (null, wenn nicht abgebrochen)
            $table->integer('created_at');           // Zeitstempel, wann der Batch erstellt wurde
            $table->integer('finished_at')->nullable(); // Zeitstempel, wann der Batch abgeschlossen wurde (null, wenn noch nicht abgeschlossen)
        });

        // Erstellt die Tabelle 'failed_jobs', in der fehlgeschlagene Jobs gespeichert werden.
        // So können Fehler analysiert und ggf. Jobs erneut angestoßen werden.
        Schema::create('failed_jobs', function (Blueprint $table) {
            $table->id();                        // Eindeutige ID für jeden fehlgeschlagenen Job
            $table->string('uuid')->unique();    // Universally Unique Identifier für den Job
            $table->text('connection');          // Name der Verbindung (z.B. 'database', 'redis')
            $table->text('queue');               // Name der Queue, in der der Job lag
            $table->longText('payload');         // Die Job-Daten, die zum Fehler geführt haben
            $table->longText('exception');       // Die Fehlermeldung bzw. Exception-Text
            $table->timestamp('failed_at')->useCurrent(); // Zeitstempel, wann der Fehler aufgetreten ist
        });
    }

    /**
     * Macht die Migration rückgängig, indem die Tabellen wieder gelöscht werden.
     *
     * Die Methode 'down' wird beim Ausführen von 'php artisan migrate:rollback' aufgerufen.
     */
    public function down(): void
    {
        // Löscht die Tabelle 'jobs', falls sie existiert.
        Schema::dropIfExists('jobs');
        // Löscht die Tabelle 'job_batches', falls sie existiert.
        Schema::dropIfExists('job_batches');
        // Löscht die Tabelle 'failed_jobs', falls sie existiert.
        Schema::dropIfExists('failed_jobs');
    }
};
