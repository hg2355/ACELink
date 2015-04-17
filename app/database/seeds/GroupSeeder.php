<?php

class GroupSeeder extends Seeder {

	/**
	 * Run the database seeds.
	 *
	 * @return void
	 */
	public function run()
    {
        $this->command->info('Importing groups...');

        //Admin
        Sentry::getGroupProvider()->create(array(
            'name'=>'Admin',
            'permissions'=>array('admin'=>1)));

        //Teachers
        Sentry::getGroupProvider()->create(array(
            'name'=>'Teacher',
            'permissions'=>array('teacher'=>1)));

        //Students
        Sentry::getGroupProvider()->create(array(
            'name'=>'Student',
            'permissions'=>array('student'=>1)));
        
        //Parents
        Sentry::getGroupProvider()->create(array(
            'name'=>'Parent',
            'permissions'=>array('parent'=>1)));

	}

}
