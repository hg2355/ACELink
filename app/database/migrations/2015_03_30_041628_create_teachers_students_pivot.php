<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateTeachersStudentsPivot extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('teachers_students', function(Blueprint $table)
        {
            $table->integer('teacher_id');
            $table->integer('student_id');
            $table->engine('InnoDB');
            $table->primary(array('teacher_id','student_id'));
		});
	}

	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::drop('teachers_students');
	}

}
