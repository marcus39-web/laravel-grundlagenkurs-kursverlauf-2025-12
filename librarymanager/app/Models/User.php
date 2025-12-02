<?php

namespace App\Models;

// Importiert die Factory-Funktionalität für Tests und Datenbankbefüllung
// (wird für automatisiertes Erstellen von Usern in Tests/Seedern genutzt)
use Illuminate\Database\Eloquent\Factories\HasFactory;

// Importiert die Basisklasse für Authentifizierung (Login, Registrierung etc.)
use Illuminate\Foundation\Auth\User as Authenticatable;

// Importiert die Möglichkeit, Benachrichtigungen an User zu senden
use Illuminate\Notifications\Notifiable;

// Das User-Model repräsentiert einen Benutzer in der Anwendung und steuert Authentifizierung, Registrierung usw.
class User extends Authenticatable
{
    /**
     * Bindet die Traits ein:
     * - HasFactory: Ermöglicht die Nutzung von Model Factories für Tests und Seeding
     * - Notifiable: Ermöglicht das Senden von Benachrichtigungen an den User
     *
     * @use HasFactory<\Database\Factories\UserFactory>
     */
    use HasFactory, Notifiable;

    // Die $fillable-Property legt fest, welche Felder massenweise befüllbar sind (z.B. mit create() oder fill()).
    // Das schützt vor "Mass Assignment Vulnerabilities" und sorgt dafür, dass nur diese Felder gesetzt werden dürfen.
    protected $fillable = [
        'name',   // Name des Benutzers
        'email',  // E-Mail-Adresse
        'password', // Passwort (wird gehasht gespeichert)
    ];

    // Die $hidden-Property legt fest, welche Felder beim Serialisieren (z.B. zu JSON) ausgeblendet werden.
    // Das schützt sensible Daten wie das Passwort und das Remember-Token.
    protected $hidden = [
        'password',        // Passwort-Hash
        'remember_token',  // Token für "Angemeldet bleiben"
    ];

    /**
     * Gibt an, wie bestimmte Felder automatisch in native PHP-Typen umgewandelt werden.
     *
     * @return array<string, string>
     */
    protected function casts(): array
    {
        return [
            'email_verified_at' => 'datetime', // Zeitstempel, wann die E-Mail bestätigt wurde
            'password' => 'hashed',            // Passwort wird automatisch gehasht
        ];
    }
}
