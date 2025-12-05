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
        'matriculation_number',
        'main_course_id',
    ];
// Falls der zugehörige Tabellen-Name nicht dem Laravel-Konventionsschema entspricht, kann hier der abweichende Tabellenname angegeben genutzt werden

// (Laravel-Konvention: Tabellenname im Plural, also "students" für das Model "Student")
  //  protected $table = 'students';
//)

    public function mainCourse() {
        // Ein Student hat gehört zu einem Kurs
        return $this->belongsTo(Course::class, 'main_course_id');
    }

    public function courses() {
        return $this->belongsToMany(Course::class, 'course_student')
            ->withTimestamps();
    }
}