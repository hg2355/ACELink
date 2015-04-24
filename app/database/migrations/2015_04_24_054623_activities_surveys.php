<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class ActivitiesSurveys extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('activities_surveys', function(Blueprint $table)
        {
            $table->integer('parent_id');
            $table->integer('activity_id');
            $table->smallInteger('q1');
            $table->smallInteger('q2');
		});
	}

	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::drop('activities_questions');
	}

}
