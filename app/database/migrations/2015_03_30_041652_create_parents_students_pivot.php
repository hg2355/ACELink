<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateParentsStudentsPivot extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('parents_students', function(Blueprint $table)
        {
            $table->integer('parent_id');
            $table->integer('student_id');
            $table->engine = 'InnoDB';
            $table->primary(array('parent_id','student_id'));
		});
	}

	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::drop('parents_students');
	}

}
