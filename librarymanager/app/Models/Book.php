<?php

namespace App\Models;

// Importiert die Factory-Funktionalität für Tests und Datenbankbefüllung
// (wird für automatisiertes Erstellen von Büchern in Tests/Seedern genutzt)
use Illuminate\Database\Eloquent\Factories\HasFactory;

// Importiert die Model-Basisklasse von Laravel
use Illuminate\Database\Eloquent\Model;

// Das Book-Model repräsentiert einen Eintrag in der Tabelle "books" der Datenbank.
// Es wird für alle Datenbankoperationen rund um Bücher verwendet (z.B. Abfragen, Erstellen, Aktualisieren, Löschen).
class Book extends Model
{
    // Bindet das HasFactory-Feature ein, um Factorys für Tests und Seeding zu nutzen
    use HasFactory;

    // Die $fillable-Property legt fest, welche Felder massenweise befüllbar sind (z.B. mit create() oder fill()).
    // Das schützt vor "Mass Assignment Vulnerabilities" und sorgt dafür, dass nur diese Felder gesetzt werden dürfen.
    protected $fillable = [
        'title',          // Buchtitel
        'author',         // Autor des Buches
        'isbn',           // ISBN-Nummer
        'published_year', // Erscheinungsjahr
        'category',       // Kategorie des Buches
    ];
    // Hier könnten weitere Model-spezifische Methoden oder Eigenschaften ergänzt werden
}
