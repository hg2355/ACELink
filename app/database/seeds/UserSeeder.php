<?php

class UserSeeder extends Seeder {

	/**
	 * Run the database seeds.
	 *
	 * @return void
	 */
	public function run()
    {
        $this->command->info('Importing users...');
        
        $admin = Sentry::register([
                                    'email'=>'admin@tt.co',
                                    'password'=>$_ENV['ADMIN_PWD'],
                                    'activated'=>1,
                                    'traits_type'=>'TT\Models\AdminTrait'
                                    ]);

        $adminGroup = Sentry::findGroupByName('Admin'); 

        $admin->addGroup($adminGroup);     
	}

}
