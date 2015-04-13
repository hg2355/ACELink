<?php 


class BaseController extends \Controller {

	/**
	 * Setup the layout used by the controller.
	 *
	 * @return void
     */

    private $message = null;

	protected function setupLayout()
	{
		if ( ! is_null($this->layout))
		{
			$this->layout = View::make($this->layout);
		}
    }
    
    public function getFileURL($filePath)
    {
        return Response::json(['success'=>0,'url'=>asset($filePath)],200);
    }

    public function formResponse(array $errors)
    {
        return Response::json(['success'=> 0, 'errors' => $errors],200);
    }
    
    public function failResponse()
    {
        if( is_null($this->message) || empty($this->message) )
            return Response::json(['success'=> 0],500);
        else
            return Response::json(['success'=>0,'msg'=>$this->message],200);
    }

    public function successResponse()
    {
        if( is_null($this->message) || empty($this->message) )
            return Response::json(['success'=> 1],200);
        else
            return Response::json(['success'=>1,'msg'=>$this->message],200);
    }

    public function setMsg($msg_path, array $args = [])
    {
        if( is_null($msg_path) || empty($msg_path) )
            return;
        
        $this->message = \Lang::get($msg_path,$args);
    }

    public function getMsg()
    {
        return is_null($this->message) ? '' : $this->message;
    }

}
