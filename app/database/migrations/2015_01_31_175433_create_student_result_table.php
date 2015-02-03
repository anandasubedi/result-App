<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateStudentResultTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('student_result', function(Blueprint $table)
		{
			$table->increments('id');
			$table->integer('student_id')->unsigned()->index();
			$table->integer('class_id')->unsigned()->index();
			$table->integer('total_marks')->unsigned()->nullable();
			$table->float('percentage')->nullable();
			$table->string('division')->nullable();
			$table->string('remarks')->nullable();
			$table->integer('rank')->unsigned()->nullable();
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
		Schema::drop('student_result');
	}

}
