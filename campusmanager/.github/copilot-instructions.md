# Copilot Instructions for campusmanager Laravel Project

## Projektüberblick
- Dies ist ein Starter-Repo für den "Laravel-Grundlagenkurs" mit dem Beispielprojekt "campusmanager".
- Die Codebasis folgt weitgehend dem Standard-Laravel-Framework, mit MVC-Struktur:
  - Controller: `app/Http/Controllers/`
  - Models: `app/Models/`
  - Views: `resources/views/`
  - Routen: `routes/web.php`, `routes/console.php`
- Datenbankmigrationen und Seeder liegen unter `database/migrations/` und `database/seeders/`.

## Wichtige Workflows
- **Setup:**
  - `composer install`
  - `cp .env.example .env`
  - `php artisan key:generate`
  - Passe `.env` für die Datenbank an (siehe README).
- **Migrationen:**
  - `php artisan migrate` (Migrationen ausführen)
  - `php artisan migrate:fresh --seed` (Datenbank neu aufsetzen und Seed-Daten einspielen)
- **Server starten:**
  - `php artisan serve --host=0.0.0.0 --port=8000`
- **Cache leeren:**
  - `php artisan config:clear` (nach Änderungen an `.env` oder Konfiguration)
- **Tests:**
  - Tests liegen unter `tests/Feature/` und `tests/Unit/`
  - Ausführen mit `php artisan test` oder `vendor/bin/phpunit`

## Projektkonventionen
- Views verwenden Blade-Templates (`.blade.php`).
- Layouts liegen typischerweise unter `resources/views/layouts/`.
- Controller-Namen und Methoden folgen Laravel-Konventionen (z.B. `HomeController@index`).
- Models sind im Ordner `app/Models/` und repräsentieren Datenbanktabellen.
- Migrationen und Seeder werden über Artisan-Befehle verwaltet.
- Routen werden in `routes/web.php` für Web und `routes/console.php` für CLI definiert.

## Integration & Kommunikation
- Datenbankverbindung wird über `.env` gesteuert.
- Externe Pakete werden über Composer verwaltet (`composer.json`).
- Frontend-Assets (CSS/JS) liegen unter `resources/` und werden mit Vite gebündelt (`vite.config.js`).

## Beispiele für typische Aufgaben
- **Neue View anlegen:**
  - `php artisan make:view layouts.app` (erstellt `resources/views/layouts/app.blade.php`)
- **Neuen Controller erstellen:**
  - `php artisan make:controller ExampleController`
- **Neue Migration erstellen:**
  - `php artisan make:migration create_example_table`

## Hinweise für AI Agents
- Halte dich an die Laravel-Konventionen für Dateinamen, Ordnerstruktur und Befehle.
- Prüfe nach Änderungen an Konfigurationsdateien immer, ob ein Cache-Reset nötig ist (`php artisan config:clear`).
- Nutze die README und die vorhandenen Artisan-Befehle als Referenz für typische Workflows.
- Bei Fehlern: Prüfe Fehlermeldungen im Terminal und konsultiere die README für Troubleshooting.

---
Feedback erwünscht: Bitte gib Bescheid, wenn wichtige Workflows, Konventionen oder Integrationspunkte fehlen oder unklar sind!
