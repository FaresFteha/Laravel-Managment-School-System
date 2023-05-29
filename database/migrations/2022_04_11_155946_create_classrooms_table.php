<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateClassroomsTable extends Migration {

	public function up()
	{
		Schema::create('classrooms', function(Blueprint $table) {
			$table->id();
			$table->bigInteger('Grade_id')->unsigned();
			$table->foreign('Grade_id')->references('id')->on('Grades')
			->onDelete('cascade');
			$table->string('name_class');
			$table->timestamps();
		});
	}

	public function down()
	{
		Schema::drop('classrooms');
		/*
		Schema::table('classrooms', function(Blueprint $table) {
			$table->dropForeign('classrooms_Grade_id_foreign');
		});
         */
	}
}