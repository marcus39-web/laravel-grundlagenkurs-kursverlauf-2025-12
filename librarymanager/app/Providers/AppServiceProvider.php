<?php

namespace App\Providers;

// Importiert die ServiceProvider-Basisklasse von Laravel
use Illuminate\Support\ServiceProvider;

// Der AppServiceProvider ist einer der zentralen Service Provider in Laravel.
// Er wird beim Starten der Anwendung automatisch geladen und dient dazu,
// globale Dienste, Bindings oder Konfigurationen zu registrieren.
class AppServiceProvider extends ServiceProvider
{
    /**
     * Hier können beliebige Services, Klassen oder Bindings in den Service Container registriert werden.
     * Diese Methode wird sehr früh im Lebenszyklus der Anwendung aufgerufen.
     * Typische Anwendungsfälle: eigene Helper, globale Singletons, externe Bibliotheken.
     */
    public function register(): void
    {
        // Hier können z.B. eigene Services oder Bibliotheken registriert werden
        // Beispiel: $this->app->bind('ServiceName', ServiceClass::class);
    }

    /**
     * Wird nach dem Registrieren aller Services aufgerufen und dient zum Bootstrap der Anwendung.
     * Hier können z.B. Events, Routen, View-Composer oder globale Einstellungen gesetzt werden.
     */
    public function boot(): void
    {
        // Hier können z.B. globale Konfigurationen, Events oder View-Composer gesetzt werden
        // Beispiel: View::share('key', 'value');
    }
}
