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
        Schema::create('fund_acounts', function (Blueprint $table) {
            $table->id();
            $table->date('date');
            $table->foreignId('receipt_id')->nullable()-> references('id')->on('receipt_students')->onDelete('cascade');
            $table->foreignId('payment_id')->nullable()->references('id')->on('payment_students')->onDelete('cascade');
            $table->decimal('Debit')->nullable();
            $table->decimal('Credit')->nullable();
            $table->string('description');  
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
        Schema::dropIfExists('fund_acounts');
    }
};
