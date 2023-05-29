<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('student_averages', function (Blueprint $table) {
            $table->id();
            $table->foreignId('Student_id')->references('id')->on('students')->onDelete('cascade');
            $table->foreignId('Grade_id')->references('id')->on('Grades')->cascadeOnDelete();
            $table->foreignId('Classroom_id')->references('id')->on('classrooms')->onDelete('cascade');
            $table->foreignId('Section_id')->references('id')->on('sections')->onDelete('cascade');
            $table->foreignId('Subject_id')->references('id')->on('subjects')->cascadeOnDelete();
            $table->foreignId('Academic_id')->references('id')->on('academic_years')->cascadeOnDelete();
            $table->string('semester')->comment(
            '1->الفصل الدراسي الاول
            2->الفصل الدراسي الثاني');
            
            $table->double('monthly_exam');
            $table->double('school_year_work');
            $table->double('end_of_term_exam');
            $table->double('mark');
           // $table->double('average');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('student_averages');
    }
};
