<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateTeachersSchoolsPivot extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('teachers_schools', function(Blueprint $table)
        {
            $table->integer('teacher_id');
            $table->integer('school_id');

            $table->engine = 'InnoDB';
            $table->primary(['teacher_id','school_id']);
		});
	}

	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::drop('teachers_schools');
	}

}
