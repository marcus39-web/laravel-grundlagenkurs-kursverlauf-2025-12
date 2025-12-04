<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Course extends Model
{
    use HasFactory;

    protected $fillable = [
        'name',
        'shortname',
        'ects',
    ];

    public function students() {
        // Ein Kurs kann viele Studenten haben (1:n Beziehung)
        // Ist in diesem Projekt nicht realistisch, da ein Student nur einen Hauptkurs haben kann.

       // return $this->hasMany(Student::class, 'main_course_id');
       
       // Viele Studierende können sich für viele Kurse anmelden (n:m Beziehung)
       return $this->belongsToMany(Student::class, 'course_student')
       ->withTimestamps();
    }



}
