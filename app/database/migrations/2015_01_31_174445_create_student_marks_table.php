<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateStudentMarksTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('student_marks', function(Blueprint $table)
		{
			$table->increments('id');
			$table->integer('subject_id')->unsigned()->index();
			$table->integer('student_id')->unsigned()->index();
			$table->integer('marks_obtained')->unsigned()->nullable();
			$table->string('status');
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
		Schema::drop('student_marks');
	}

}
