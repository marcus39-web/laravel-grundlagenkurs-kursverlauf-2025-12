<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Student extends Model
{
    use HasFactory;
    protected $fillable=[
        'firstname',
        'lastname',
        'email',
        'age',
           'marticel_number'
    ];

    public function mainCourse() {
        // Ein Student hat genau einen Hauptkurs
        return $this->belongsTo(Course::class, 'main_course_id');
    }

    public function courses() {
        // Viele Studierende können sich für viele Kurse anmelden (n:m Beziehung)
        return $this->belongsToMany(Course::class, 'course_student')
            ->withTimestamps();
    }   
}