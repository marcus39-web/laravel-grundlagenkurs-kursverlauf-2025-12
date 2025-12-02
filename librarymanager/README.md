<p align="center"><a href="https://laravel.com" target="_blank"><img src="https://raw.githubusercontent.com/laravel/art/master/logo-lockup/5%20SVG/2%20CMYK/1%20Full%20Color/laravel-logolockup-cmyk-red.svg" width="400" alt="Laravel Logo"></a></p>

<p align="center">
<a href="https://github.com/laravel/framework/actions"><img src="https://github.com/laravel/framework/workflows/tests/badge.svg" alt="Build Status"></a>
<a href="https://packagist.org/packages/laravel/framework"><img src="https://img.shields.io/packagist/dt/laravel/framework" alt="Total Downloads"></a>
<a href="https://packagist.org/packages/laravel/framework"><img src="https://img.shields.io/packagist/v/laravel/framework" alt="Latest Stable Version"></a>
<a href="https://packagist.org/packages/laravel/framework"><img src="https://img.shields.io/packagist/l/laravel/framework" alt="License"></a>
</p>
# Laravel-Grundlagenkurs – Teilnehmer-Starter-Repo

Dieses Repository ist der Ausgangspunkt für den Kurs **Laravel-Grundlagen** mit dem Projekt **campusmanager**.

Es enthält:

- ein vorbereitetes Laravel-Projekt (oder einen Verweis darauf)
- diese README mit den wichtigsten Schritten
- eine einfache Git- und Artisan-Übersicht

Ziel: Du sollst möglichst schnell mit Laravel arbeiten können, ohne lange Installationshürden.

---

## Voraussetzungen

- Zugang zu einer Ubuntu-VM (wird im Kurs zur Verfügung gestellt)
- VS Code mit der Erweiterung „Remote – SSH“
- PHP und Composer sind auf der VM installiert (wird im Kurs vorbereitet)

---

## Projekt auf der VM einrichten

1. Per VS Code per SSH auf die VM verbinden.
2. Terminal öffnen und einen Ordner für Laravel-Projekte anlegen:

   ```bash
   mkdir -p ~/laravel
   cd ~/laravel
   ```

3. Dieses Starter-Repo klonen (URL bekommst du im Kurs):

   ```bash
   git clone <DEINE_REPO_URL> campusmanager
   cd campusmanager
   ```

4. Abhängigkeiten installieren:

   ```bash
   composer install
   cp .env.example .env
   php artisan key:generate
   ```

5. Datenbankverbindung in `.env` anpassen. Die Zugangsdaten bekommst du im Kurs, typischer Aufbau:

   ```env
   DB_CONNECTION=mysql
   DB_HOST=127.0.0.1
   DB_PORT=3306
   DB_DATABASE=laravelkurs
   DB_USERNAME=laravel_user
   DB_PASSWORD=LaravelKurs!2025
   ```

6. Migrationen ausführen:

   ```bash
   php artisan migrate
   ```

7. Entwicklungsserver starten:

   ```bash
   php artisan serve --host=0.0.0.0 --port=8000
   ```

   Danach kannst du im Browser deines Hostsystems die Seite öffnen, zum Beispiel:

   ```text
   http://<DEINE-IP>:8000
   ```

---

## Wichtige Artisan-Befehle im Kurs

```bash
# Datenbank migrieren
php artisan migrate

# Datenbank neu aufsetzen und Seeder ausführen
php artisan migrate:fresh --seed

# Konfigurations-Cache leeren (z. B. nach Änderung von .env)
php artisan config:clear

# Entwicklungsserver starten
php artisan serve --host=0.0.0.0 --port=8000
```

---

## Optionale Git-Verwendung

Wenn du deinen Fortschritt sichern möchtest, kannst du Git verwenden:

```bash
git status
git add .
git commit -m "Stand Tag 1"
git push origin main
```

Dies ist optional und abhängig davon, ob der Kurs Git behandelt.

---

## Hilfe im Kurs

Wenn etwas nicht funktioniert:

- prüfe Fehlermeldungen im Terminal
- frage deinen Trainer nach typischen Stolpersteinen (zum Beispiel fehlende Migrationen, falsche Route, View nicht gefunden)
- gib nicht auf: Fehlersuche gehört zum Entwickleralltag dazu

## About Laravel

Laravel is a web application framework with expressive, elegant syntax. We believe development must be an enjoyable and creative experience to be truly fulfilling. Laravel takes the pain out of development by easing common tasks used in many web projects, such as:

- [Simple, fast routing engine](https://laravel.com/docs/routing).
- [Powerful dependency injection container](https://laravel.com/docs/container).
- Multiple back-ends for [session](https://laravel.com/docs/session) and [cache](https://laravel.com/docs/cache) storage.
- Expressive, intuitive [database ORM](https://laravel.com/docs/eloquent).
- Database agnostic [schema migrations](https://laravel.com/docs/migrations).
- [Robust background job processing](https://laravel.com/docs/queues).
- [Real-time event broadcasting](https://laravel.com/docs/broadcasting).

Laravel is accessible, powerful, and provides tools required for large, robust applications.

## Learning Laravel

Laravel has the most extensive and thorough [documentation](https://laravel.com/docs) and video tutorial library of all modern web application frameworks, making it a breeze to get started with the framework. You can also check out [Laravel Learn](https://laravel.com/learn), where you will be guided through building a modern Laravel application.

If you don't feel like reading, [Laracasts](https://laracasts.com) can help. Laracasts contains thousands of video tutorials on a range of topics including Laravel, modern PHP, unit testing, and JavaScript. Boost your skills by digging into our comprehensive video library.

## Laravel Sponsors

We would like to extend our thanks to the following sponsors for funding Laravel development. If you are interested in becoming a sponsor, please visit the [Laravel Partners program](https://partners.laravel.com).

### Premium Partners

- **[Vehikl](https://vehikl.com)**
- **[Tighten Co.](https://tighten.co)**
- **[Kirschbaum Development Group](https://kirschbaumdevelopment.com)**
- **[64 Robots](https://64robots.com)**
- **[Curotec](https://www.curotec.com/services/technologies/laravel)**
- **[DevSquad](https://devsquad.com/hire-laravel-developers)**
- **[Redberry](https://redberry.international/laravel-development)**
- **[Active Logic](https://activelogic.com)**

## Contributing

Thank you for considering contributing to the Laravel framework! The contribution guide can be found in the [Laravel documentation](https://laravel.com/docs/contributions).

## Code of Conduct

In order to ensure that the Laravel community is welcoming to all, please review and abide by the [Code of Conduct](https://laravel.com/docs/contributions#code-of-conduct).

## Security Vulnerabilities

If you discover a security vulnerability within Laravel, please send an e-mail to Taylor Otwell via [taylor@laravel.com](mailto:taylor@laravel.com). All security vulnerabilities will be promptly addressed.

## License

The Laravel framework is open-sourced software licensed under the [MIT license](https://opensource.org/licenses/MIT).
