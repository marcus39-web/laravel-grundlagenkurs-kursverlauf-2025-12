<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Student;

class StudentSeeder extends Seeder
{
    public function run()
    {
        // Erzeuge 10 Beispiel-Studenten
        Student::factory()->count(10)->create();
    }
}
