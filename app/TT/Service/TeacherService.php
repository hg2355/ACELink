<?php namespace TT\Service;

use Sentry;
use TT\School\SchoolRepository;
use TT\Teacher\TeacherRepository;
use TT\Teacher\TeacherTraitRepository;

class TeacherService 
{
    private $teacherRepo = null;
    private $schoolRepo = null;
    private $teacherTraitRepo = null;

    public function __construct(TeacherRepository $teacherRepo, SchoolRepository $schoolRepo, TeacherTraitRepository $teacherTraitRepo)
    {
        $this->teacherRepo = $teacherRepo;
        $this->schoolRepo = $schoolRepo;
        $this->teacherTraitRepo = $teacherTraitRepo;
    }
    
    public function resetPassword(array $input)
    {
        try
        {
            \DB::beginTransaction();

            $email = $input['email'];
            
            $user = Sentry::findUserByLogin($email);

            $resetCode = $user->getResetPasswordCode();

            if($user->checkResetPasswordCode($resetCode))
            {
                $newPassword = str_random(16);

                if( $user->attemptResetPassword($resetCode,$newPassword) )
                {
                    \Event::fire('user.resetpwd',[$user,$newPassword]);
                    \DB::commit();
                    
                    return true;
                }

                return false;

            }

            return false;
        }

        catch(\Exception $ex)
        {   
            \Log::error($ex);
            \DB::rollback();
            return false;        
        }


    }

    public function create(array $data)
    {
        try
        {
            \DB::beginTransaction();
            
            $teacherTraitData = array();
            $teacherTraitData['grade'] = $data['grade'];
            
            $teacherTrait = $this->teacherTraitRepo->create($teacherTraitData);

            $data = array_add($data,'traits_id',$teacherTrait->id);

            $schoolData = array_only($data,['school','zipcode']);

            $password = str_random(16);
            $activated = 1;

            $data['password'] = $password;
            $data['activated'] = $activated;

            $teacherData = array_only($data,['first_name','last_name','email','title','traits_id','password','activated']);
            
            $teacher = $this->teacherRepo->create($teacherData);
            
            $teacherGroup = Sentry::findGroupByName('Teacher');

            $teacher->addGroup($teacherGroup);
        
            $school = $this->schoolRepo->findOrCreate($schoolData);

            $teacher->schools()->attach($school->id);

            \Event::fire('user.created',[$teacher,$password]);            
            
            \DB::commit();

            return true;
        }

        catch(\Exception $ex)
        {
            \Log::error($ex);
            \DB::rollback();
            return false;
        }
    }
}
