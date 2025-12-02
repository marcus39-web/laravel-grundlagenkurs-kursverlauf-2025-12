<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

// Diese Migration erstellt die Tabellen für Benutzer, Passwort-Resets und Sessions.
// Migrationen sind Versionierungsdateien für die Datenbankstruktur und werden mit "php artisan migrate" ausgeführt.
return new class extends Migration
{
    /**
     * Führt die Migration aus: Erstellt die Tabellen "users", "password_reset_tokens" und "sessions".
     */
    public function up(): void
    {
        // Erstellt die Tabelle "users" für alle Benutzer der Anwendung
        Schema::create('users', function (Blueprint $table) {
            $table->id(); // Primärschlüssel (auto-increment)
            $table->string('name'); // Name des Benutzers
            $table->string('email')->unique(); // Eindeutige E-Mail-Adresse
            $table->timestamp('email_verified_at')->nullable(); // Zeitstempel für E-Mail-Bestätigung
            $table->string('password'); // Passwort-Hash
            $table->rememberToken(); // Token für "Angemeldet bleiben"
            $table->timestamps(); // Erstellt "created_at" und "updated_at"
        });

        // Erstellt die Tabelle für Passwort-Reset-Tokens
        Schema::create('password_reset_tokens', function (Blueprint $table) {
            $table->string('email')->primary(); // E-Mail als Primärschlüssel
            $table->string('token'); // Reset-Token
            $table->timestamp('created_at')->nullable(); // Zeitpunkt der Erstellung
        });

        // Erstellt die Tabelle für Sessions (z.B. für Login-Sessions)
        Schema::create('sessions', function (Blueprint $table) {
            $table->string('id')->primary(); // Session-ID als Primärschlüssel
            $table->foreignId('user_id')->nullable()->index(); // Verknüpfung zum User (optional)
            $table->string('ip_address', 45)->nullable(); // IP-Adresse des Nutzers
            $table->text('user_agent')->nullable(); // Browser/Client-Info
            $table->longText('payload'); // Session-Daten
            $table->integer('last_activity')->index(); // Zeitstempel der letzten Aktivität
        });
    }

    /**
     * Macht die Migration rückgängig: Löscht die Tabellen wieder.
     */
    public function down(): void
    {
        Schema::dropIfExists('users');
        Schema::dropIfExists('password_reset_tokens');
        Schema::dropIfExists('sessions');
    }
};
