<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('course_student', function (Blueprint $table) {
           
            $table->foreignId('course_id')
                ->constrained('courses')
                ->cascaonDelete();

            $table->foreignId('student_id')
                ->constrained('students')
                ->cascaonDelete();

            $table->timestamps();

            // Kombinierte eindeutige Einschränkung, um doppelte Einträge zu vermeiden
            $table->unique(['course_id', 'student_id']);
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('course_student');
    }
};
