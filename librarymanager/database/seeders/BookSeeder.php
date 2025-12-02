<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class BookSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        // Feste Bücher
        \App\Models\Book::create([
            'title' => 'Der Hobbit',
            'author' => 'J.R.R. Tolkien',
            'isbn' => '978-3-423-21300-8',
            'published_year' => 1937,
            'category' => 'Fantasy',
        ]);
        \App\Models\Book::create([
            'title' => '1984',
            'author' => 'George Orwell',
            'isbn' => '978-3-423-01300-8',
            'published_year' => 1949,
            'category' => 'Dystopie',
        ]);
        \App\Models\Book::create([
            'title' => 'Die Verwandlung',
            'author' => 'Franz Kafka',
            'isbn' => '978-3-596-51231-1',
            'published_year' => 1915,
            'category' => 'Klassiker',
        ]);
        \App\Models\Book::create([
            'title' => 'Harry Potter und der Stein der Weisen',
            'author' => 'J.K. Rowling',
            'isbn' => '978-3-551-55851-2',
            'published_year' => 1997,
            'category' => 'Fantasy',
        ]);
        \App\Models\Book::create([
            'title' => 'Der kleine Prinz',
            'author' => 'Antoine de Saint-Exupéry',
            'isbn' => '978-3-518-22338-4',
            'published_year' => 1943,
            'category' => 'Kinderbuch',
        ]);

        // Faker-Daten
        $faker = \Faker\Factory::create();
        for ($i = 0; $i < 5; $i++) {
            \App\Models\Book::create([
                'title' => $faker->sentence(3),
                'author' => $faker->name(),
                'isbn' => $faker->unique()->isbn13(),
                'published_year' => $faker->numberBetween(1900, 2025),
                'category' => $faker->word(),
            ]);
        }
    }
}
