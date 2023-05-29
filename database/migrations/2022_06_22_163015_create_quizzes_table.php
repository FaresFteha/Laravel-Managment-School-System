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
        Schema::create('quizzes', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->foreignId('Grade_id')->references('id')->on('grades')->cascadeOnDelete();
            $table->foreignId('Classroom_id')->references('id')->on('classrooms')->cascadeOnDelete();
            $table->foreignId('Section_id')->references('id')->on('Sections')->cascadeOnDelete();
            $table->foreignId('Teacher_id')->references('id')->on('teachers')->cascadeOnDelete();
            $table->foreignId('Subject_id')->references('id')->on('subjects')->cascadeOnDelete();
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
        Schema::dropIfExists('quizzes');
    }
};
