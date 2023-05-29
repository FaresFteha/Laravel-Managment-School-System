<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateSectionsTable extends Migration {

	public function up()
	{
		Schema::create('Sections', function(Blueprint $table) {
			$table->id();
			$table->bigInteger('Grade_id')->unsigned();
			$table->bigInteger('classroom_id')->unsigned();
			$table->string('name_sections');
			$table->integer('status');
			$table->foreign('Grade_id')->references('id')->on('Grades')
			->onDelete('cascade');
			$table->foreign('classroom_id')->references('id')->on('classrooms')
			->onDelete('cascade');
			$table->timestamps();
		});
	}

	public function down()
	{
		Schema::drop('Sections');
		/* 
		Schema::table('classrooms', function(Blueprint $table) {
			$table->dropForeign('classrooms_Grade_id_foreign');
		});
		Schema::table('Sections', function(Blueprint $table) {
			$table->dropForeign('Sections_Grade_id_foreign');
		});
		Schema::table('Sections', function(Blueprint $table) {
			$table->dropForeign('Sections_classroom_id_foreign');
		});
		 */
	}
}