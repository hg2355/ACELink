<?php namespace TT\Code;

use TT\Models\Code;
use TT\Auth\Authenticator;
use TT\Support\ModelRepository;

class CodeRepository extends ModelRepository
{

    public function __construct(Code $code)
    {
        $this->model = $code;
    }

    public function create(array $data)
    {
        $this->save($data);

        return $this->model;
    }

    public function findByCode($code)
    {
        return Code::where('student_code','=',$code)->first();
    }

    public function clearModel()
    {
        $this->model = new Code;
    }

    public function deleteCode($code)
    {
        if( is_null($code) )
            return;
        else
        {
            Code::where('student_code','=',$code)->delete();
        }
    }

    public function generateCode()
    {
        do
        {
            $code = rand(100000,999999);
            
            $count = Code::where('student_code', $code)->count();
        } while($count > 0);

        return $code;
    }
}
