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
        Schema::create('student_acounnts', function (Blueprint $table) {
            $table->id();
            $table->date('date');
            $table->decimal('Debit',8,2)->nullable();//مدين
            $table->decimal('credit',8,2)->nullable();//دائن
            $table->string('description')->nullable();
            $table->string('type');

            $table->foreignId('student_id')->references('id')->on('students')->onDelete('cascade');
            $table->foreignId('Fee_invoicses_id')->nullable()->references('id')->on('fee_invoices')->onDelete('cascade');
            $table->foreignId('receipt_id')->nullable()->references('id')->on('receipt_students')->onDelete('cascade');
            $table->foreignId('proccessing_id')->nullable()->references('id')->on('proccessing_fees')->onDelete('cascade');
            $table->foreignId('payment_id')->nullable()->references('id')->on('payment_students')->onDelete('cascade');

            
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
        Schema::dropIfExists('student_acounnts');
    }
};
