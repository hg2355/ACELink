<?php namespace TT\Support;

/*
 * Helper class for validation form input
 */
use Validator;

class FormModel
{
    private $validator;
    protected $inputData;

    public function __construct()
    {
        
    }

	/*
	 * runs a trim on the data
	 */
	public function getstr($key, $default=''){

		if(array_key_exists($key, $this->inputData )){

			$v = $this->inputData[$key];	

			return trim($v);	
		}

		return $default; 
	}

	public function get($key, $default=''){

		if(array_key_exists($key, $this->inputData )){

			$v = $this->inputData[$key];	

			return ($v);	
		}

		return $default; 
	}

    public function getInputData()
    {
        return $this->inputData;
    }

    public function isValid(array $input)
    {
		$this->inputData = $input;
        
        $this->beforeValidation();

        $this->validator = Validator::make($this->getInputData(), $this->getPreparedRules(), $this->getMessages(), $this->getCustomAttributes());

        $this->addValidationRules($this->validator);

        return $this->validator->passes();
    }

	public function getValidator(){
	
		return $this->validator;
	}

    public function getErrors()
    {
        return $this->validator->errors()->toArray();
    }

    protected function getPreparedRules()
    {
        return [];
    }

	protected function getMessages(){

		return [];	
	}

	protected function getCustomAttributes(){

		return [];	
	}
	/*
	 * Setup before validation.
	 * 
	 * Add Validation extensions here, 
	 */

    protected function beforeValidation() {}

	/*
	 * Add validation rules 
	 */

    protected function addValidationRules(\Illuminate\Validation\Validator $v) {}
}
