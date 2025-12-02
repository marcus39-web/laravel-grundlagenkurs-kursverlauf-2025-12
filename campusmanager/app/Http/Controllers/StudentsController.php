<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Student;

class StudentsController extends Controller
{
    public function index() {
        //generiert eine DB-Abfrage z.B. SELECT * FROM students ORDER BY lastname
        $students = Student::orderBY('lastname')->get();

        return view('students.index', [
            'students' => $students
        ]);
    }

    public function create() {
        return view('students.create');
    }
}
