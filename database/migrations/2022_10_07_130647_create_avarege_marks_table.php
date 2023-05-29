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
        Schema::create('avarege_marks', function (Blueprint $table) {
            $table->id();
            $table->double('Avarege');
            $table->foreignId('Student_id')->references('id')->on('students')->onDelete('cascade');
            $table->string('semester')->comment(
                '1->الفصل الدراسي الاول
                2->الفصل الدراسي الثاني');
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
        Schema::dropIfExists('avarege_marks');
    }
};
