<?php namespace TT\Service;

use App;
use View;
use Sentry;
use TT\Auth\Authenticator;
use TT\Code\CodeRepository;
use TT\Parent\ParentRepository;
use TT\Student\StudentRepository;
use TT\Student\StudentTraitRepository;

class ParentService 
{
    private $parentRepo = null;
    private $studentRepo = null;
    private $studentTraitRepo = null;
    private $codeRepo = null;

    public function __construct(ParentRepository $parentRepo, StudentRepository $studentRepo, CodeRepository $codeRepo, StudentTraitRepository $studentTraitRepo)
    {
        $this->parentRepo = $parentRepo;
        $this->studentRepo = $studentRepo;
        $this->studentTraitRepo = $studentTraitRepo;
        $this->codeRepo = $codeRepo;
    }
    
    public function createWithStudent($data)
    {
        try
        {
            \DB::beginTransaction();

            $parentFullName = array_pull($data,'parent_fullname');
            $studentFullName = array_pull($data,'student_fullname');

            $index = strpos($parentFullName,' ');

            if( $index <= 0 )
            {
                $parentFirstName = $parentFullName;
                $parentLastName = '';
            }

            else
            {
                $parentFirstName = substr($parentFullName,0,$index);
                $parentLastName = substr($parentFullName,$index+1);
            }

            $index = strpos($studentFullName,' ');

            if( $index <= 0 )
            {
                $studentFirstName = $studentFullName;
                $studentLastName = '';
            }

            else
            {
                $studentFirstName = substr($studentFullName,0,$index);
                $studentLastName = substr($studentFullName,$index+1);
            }

            $parentEmail = $data['email'];
            $relation = $data['relationship'];
            $studentCode = $data['student_code'];
            
            $activated = 1;

            if(App::environment('local'))
                $parentPassword = 'letmein1';
            else
                $parentPassword = str_random(16);


            $parentData = array();
            $parentData['email'] = $parentEmail;
            $parentData['activated'] = $activated;
            $parentData['first_name'] = $parentFirstName;
            $parentData['last_name'] = $parentLastName;
            $parentData['password'] = $parentPassword;

            $studentTraitData['student_code'] = $studentCode;

            $trait = $this->studentTraitRepo->create($studentTraitData);



            $studentData['first_name'] = $studentFirstName;
            $studentData['last_name'] = $studentLastName;
            $studentData['traits_id'] = $trait->id;

            $parent = $this->parentRepo->create($parentData);
            $student = $this->studentRepo->create($studentData);
            
            $parentGroup = Sentry::findGroupByName('Parent');
            $studentGroup = Sentry::findGroupByName('Student');

            $parent->addGroup($parentGroup);
            $student->addGroup($studentGroup);

            $code = $this->codeRepo->findByCode($studentCode);
            $teacher = $code->teacher();

            $this->codeRepo->deleteCode($studentCode);
            $parent->students()->attach($student->id,['relationship'=>$relation]);
            $teacher->students()->attach($student->id);

            \Event::fire('user.created',[$parent,$parentPassword]);            

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

    public function find($id)
    {
        return $this->parentRepo->getById($id);
    }
}
