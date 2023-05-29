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
        Schema::create('exams', function (Blueprint $table) {
            $table->id();
            $table->foreignId('Subject_id')->references('id')->on('subjects')->cascadeOnDelete();
            $table->string('exam_duration');
            $table->string('day_exam');
            $table->tinyInteger('term');
            $table->foreignId('grade_id')->references('id')->on('Grades')->cascadeOnDelete();
            $table->date('start_exam');
            $table->time('exam_time');
            $table->string('academic_year');
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
        Schema::dropIfExists('exams');
    }
};
