<?php

namespace Database\Seeders;

// Importiert das User-Model, um User zu erstellen
use App\Models\User;
// Importiert das Trait für Seeder ohne Model-Events (optional, für Performance)
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
// Importiert die Seeder-Basisklasse von Laravel
use Illuminate\Database\Seeder;

// Die DatabaseSeeder ist der zentrale Einstiegspunkt für das Befüllen der Datenbank mit Testdaten.
// Hier können beliebig viele Factories oder andere Seeder aufgerufen werden.
class DatabaseSeeder extends Seeder
{
    // Bindet das Trait ein, um Model-Events beim Seeden zu deaktivieren (optional)
    use WithoutModelEvents;

    /**
     * Seedet die Datenbank mit Testdaten.
     * Diese Methode wird beim Befehl "php artisan db:seed" ausgeführt.
     */
    public function run(): void
    {
        // Erstellt 10 User mit der UserFactory
        User::factory(10)->create();

        // Ruft den BookSeeder auf, um Bücher zu erzeugen
        $this->call(BookSeeder::class);
    }
}
