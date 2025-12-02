<?php

namespace Database\Factories;

// Importiert die Factory-Basisklasse von Laravel
use Illuminate\Database\Eloquent\Factories\Factory;
// Importiert die Hash-Funktionalität für sichere Passwörter
use Illuminate\Support\Facades\Hash;
// Importiert Hilfsfunktionen für zufällige Strings
use Illuminate\Support\Str;

/**
 * Die UserFactory definiert, wie User-Modelle für Tests und Datenbank-Seeding generiert werden.
 *
 * Factories sind nützlich, um schnell viele Testdaten zu erzeugen, z.B. für automatisierte Tests oder beim Seedern.
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\User>
 */
class UserFactory extends Factory
{
    /**
     * Speichert das aktuell verwendete Passwort, damit alle User das gleiche (gehashte) Passwort bekommen.
     * Das spart Rechenzeit beim Erstellen vieler User.
     */
    protected static ?string $password;

    /**
     * Definiert die Standardwerte für ein neues User-Model.
     * Diese Methode wird von Laravel automatisch aufgerufen, wenn ein User per Factory erstellt wird.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'name' => fake()->name(), // Zufälliger Name
            'email' => fake()->unique()->safeEmail(), // Eindeutige, sichere E-Mail-Adresse
            'email_verified_at' => now(), // Zeitstempel für E-Mail-Bestätigung
            'password' => static::$password ??= Hash::make('password'), // Standardpasswort (wird gehasht)
            'remember_token' => Str::random(10), // Zufälliges Token für "Angemeldet bleiben"
        ];
    }

    /**
     * Gibt an, dass die E-Mail-Adresse des Users als "nicht verifiziert" gesetzt werden soll.
     * Praktisch für Testszenarien, in denen unbestätigte User benötigt werden.
     */
    public function unverified(): static
    {
        return $this->state(fn (array $attributes) => [
            'email_verified_at' => null,
        ]);
    }
}
