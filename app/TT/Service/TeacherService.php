<?php namespace TT\Service;

use App;
use View;
use Sentry;
use TT\Auth\Authenticator;
use TT\Code\CodeRepository;
use TT\School\SchoolRepository;
use TT\Teacher\TeacherRepository;
use TT\Teacher\TeacherTraitRepository;

class TeacherService 
{
    private $teacherRepo = null;
    private $schoolRepo = null;
    private $teacherTraitRepo = null;

    public function __construct(TeacherRepository $teacherRepo, SchoolRepository $schoolRepo, TeacherTraitRepository $teacherTraitRepo,CodeRepository $codeRepo)
    {
        $this->teacherRepo = $teacherRepo;
        $this->schoolRepo = $schoolRepo;
        $this->teacherTraitRepo = $teacherTraitRepo;
        $this->codeRepo = $codeRepo;
    }

    public function generateCodes(array $data)
    {
        $count = (int)$data['count'];
        $teacherId = $data['teacher_id'];
        $message = $data['message'];

        if( is_null($count) || is_null($teacherId) )
            return false;
        
        else
        {
            try
            {
                \DB::beginTransaction();
                
                $teacher = Authenticator::user($teacherId);

                \PDF::setPrintHeader(false);
                \PDF::setPrintFooter(false);
                \PDF::AddPage();
                
                for($i = 0; $i < $count; $i++)
                {
                    $code = $this->codeRepo->generateCode();

                    $data = array();
                    $data = array_add($data,'student_code',$code);
                    $data = array_add($data,'teacher_id',$teacherId);

                    $code = $this->codeRepo->create($data);
                    $code->message = $message;

                    $this->codeRepo->clearModel();
                    
                    $html = View::make('pages.code')->with('code',$code)->render();
                    
                    if($i % 5 === 0 && $i !== 0)
                    {
                        \PDF::AddPage();
                        \PDF::writeHTML($html,false,false,false,false,'L');
                    }

                    else
                         \PDF::writeHTML($html,false,false,false,false,'L');
                }

                \PDF::SetCreator('');
                \PDF::SetAuthor('');

                $format = '%s/%s.pdf';
                $subpath = sprintf($format,'pdfs',$teacherId);

                $format = '/%s/%s';
                $fullpath = sprintf($format,public_path(),$subpath);

                \PDF::Output($fullpath,'F');
                \DB::commit();

                return $subpath;
            }

            catch(\Exception $ex)
            {
                \Log::error($ex);
                \DB::rollback();
                return false;        
            }
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
            
            if(App::environment('local'))
                $password = 'letmein1';
            else
                $password = str_random(16);

            $activated = 1;

            $data['password'] = $password;
            $data['activated'] = $activated;

            $teacherData = array_only($data,['first_name','last_name','email','title','traits_id','password','activated']);
            
            $teacher = $this->teacherRepo->create($teacherData);
            
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

    public function find($id)
    {
        return $this->teacherRepo->getById($id);
    }
}
