<?php

namespace App\Http\Controllers;

use App\Http\Requests\StudentCreateRequest;
use App\Models\Student;
use App\Models\Course;
use Illuminate\Http\Request;

class StudentsController extends Controller
{
    public function index() {
        // generiert eine DB-Abfrage z.B. SELECT * FROM students ORDER BY lastname
        // with ('course') sorgt für, dass der Hauptkurs direkt mitgeladen wird (Eager Loading) und nicht erst bei der Ausgabe in der Schleife eine weitere Abfrage pro Student ausgeführt wird.
        $students = Student::with(['mainCourse', 'courses'])->orderBy('lastname')->get();

        return view('students.index', compact('students'));
    }

    public function create(){
        $courses = Course::orderBy('name')->get();

        return view('students.create', [
            'courses' => $courses,
        ]);
    }

    public function store( StudentCreateRequest $request ){
        $student = Student::create($request->validated());

        return redirect()
            ->route('students.index')
            ->with('success', 'Student wurde angelegt');
    }
    
    public function show(Student $student){
        return view('students.show', [
            'student' => $student,
        ]);
    }
    
    public function edit(Student $student){
        $courses = Course::orderBy('name')->get();
        return view('students.edit', [
            'student' => $student,
            'courses' => $courses, 
        ]);
    }
    
    public function update( Request $request , Student $student ){
        $data = $request->validate([
            'firstname' => ['required', 'string', 'max:100'],
            'lastname'  => ['required', 'string', 'max:100'],
            'email'     => ['required', 'email'],
            'age'       => ['nullable', 'integer', 'min:16', 'max:90'],
            'marticel_number' => [
                'required',
                'string',
                'max:20',
            ]
        ]);

        $student->update($data);

        return redirect()
            ->route('students.index')
            ->with('success', 'Student wurde erfolgreich geändert.');
    }
    
    public function destroy(Student $student){

        $student->delete();

        return redirect()
            ->route('students.index')
            ->with('success', 'Der Student wurde gelöscht');
    }
}