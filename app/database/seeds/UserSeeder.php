<?php

use TT\Models\Teacher;
use TT\Models\TeacherTrait;
use TT\Teacher\TeacherRepository;
use TT\Teacher\TeacherTraitRepository;

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
                                    'first_name'=>'Admin',
                                    'email'=>'admin@tt.co',
                                    'password'=>$_ENV['ADMIN_PWD'],
                                    'activated'=>1,
                                    'traits_type'=>'TT\Models\AdminTrait'
                                    ]);

        $adminGroup = Sentry::findGroupByName('Admin'); 
        
        $admin->addGroup($adminGroup); 

        if( App::environment('local') )
        {
            $teacherGroup = Sentry::findGroupByName('Teacher');
            $teacherRepo = new TeacherRepository(new Teacher);

            $teacherTraitRepo = new TeacherTraitRepository(new TeacherTrait);

            $trait = $teacherTraitRepo->create(['grade'=>'K']);

            $sophie = $teacherRepo->create([
                                        'first_name'=>'Sophie',
                                        'last_name'=>'Nazerian',
                                        'email'=>'sn2595@tc.columbia.edu',
                                        'password'=>'letmein1',
                                        'activated'=>1,
                                        'traits_id'=>$trait->id
                                        ]);

            $trait = $teacherTraitRepo->create(['grade'=>'K']);

            $harpreet = $teacherRepo->create([
                                        'first_name'=>'Harpreet',
                                        'last_name'=>'Gill',
                                        'email'=>'hg2355@columbia.edu',
                                        'password'=>'letmein1',
                                        'activated'=>1,
                                        'traits_id'=>$trait->id
                                        ]);

            
            $trait = $teacherTraitRepo->create(['grade'=>'K']);

            $thea = $teacherRepo->create([
                                        'first_name'=>'Thea',
                                        'last_name'=>'Hogarth',
                                        'email'=>'teh2115@tc.columbia.edu',
                                        'password'=>'letmein1',
                                        'activated'=>1,
                                        'traits_id'=>$trait->id
                                        ]);

            
            $sophie->addGroup($teacherGroup);
            $harpreet->addGroup($teacherGroup);
            $thea->addGroup($teacherGroup);
        }    
	}

}
