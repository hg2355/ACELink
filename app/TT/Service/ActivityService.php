<?php namespace TT\Service;

use App;
use View;
use Sentry;
use BaseController;
use TT\Models\Activity;
use TT\Auth\Authenticator;
use TT\Activity\ActivityRepository;

class ActivityService 
{
    private $activityRepo = null;

    public function __construct(ActivityRepository $activityRepo)
    {
        $this->activityRepo = $activityRepo;
    }

    public function all()
    {
        try
        {
            return $this->activityRepo->all();
        }

        catch(\Exception $ex)
        {
            \Log::error($ex);
        }
    }

    public function create($data, BaseController $listener)
    {
        try
        {
            \DB::beginTransaction();

            $activity = array_pull($data,'activity');
            $description = array_pull($data,'description');

            $format = '%s/%s';
            $activitiesPath = sprintf($format,public_path(),'activities');
            $descriptionsPath = sprintf($format,public_path(),'descriptions');

            $activityFileName = $data['title'].'.php';

            $descriptionFileName = $data['title'].'.php';

            $activityFileName = strtolower($activityFileName);
            $activityFileName = str_replace(' ','-',$activityFileName);

            $descriptionFileName = strtolower($descriptionFileName);
            $descriptionFileName = str_replace(' ','-',$descriptionFileName);


            $activityFilePath = sprintf($format,$activitiesPath,$activityFileName);
            $descriptionFilePath = sprintf($format,$descriptionsPath,$descriptionFileName);
            
            $activity->move($activitiesPath,$activityFileName);
            $description->move($descriptionsPath,$descriptionFileName);

            $format = '/activities/%s';
            $relativePath = sprintf($format,$activityFileName);
            $data = array_add($data,'activity_url',$relativePath);
            
            $format = '/descriptions/%s';
            $relativePath = sprintf($format,$descriptionFileName);
            $data = array_add($data,'description_url',$relativePath);
            
            $activity = $this->activityRepo->create($data);
    
            \DB::commit();

            $listener->setMsg('messages.entity_store_success',['name'=>$data['title']]);

            return true;
        }

        
        catch(\Exception $ex)
        {
            \Log::error($ex);
            \DB::rollback();
            $listener->setMsg('messages.entity_store_failure',['name'=>$data['title']]);
            return false;
        }
    }

    public function update($id, $data,BaseController $listener)
    {

        $activity = $this->activityRepo->getById($id);

        if( is_null($activity) )
        {
            $listener->setMsg('messages.entity_not_found',['entity'=>'Activity']);
            return false;
        }

        try
        {
            \DB::beginTransaction();


            if( array_key_exists('activity',$data) )
            {
                
                $format = '%s/%s';
                
                $activityFile = array_pull($data,'activity');
                $activitiesPath = sprintf($format,public_path(),'activities');
                $activityFileName = $data['title'].'.php';

                $activityFileName = strtolower($activityFileName);
                $activityFileName = str_replace(' ','-',$activityFileName);

                $activityFilePath = sprintf($format,$activitiesPath,$activityFileName);
                
                $format = '%s%s';

                $path = sprintf($format,public_path(),$activity->activity_url);
                
                \Log::info($path);

                \File::delete($path);

                $format = '/activities/%s';
                $relativePath = sprintf($format,$activityFileName);
                $data = array_add($data,'activity_url',$relativePath);

                \Log::info($activityFileName);    
                $activityFile->move($activitiesPath,$activityFileName);
            }
            

            if( array_key_exists('description',$data) )
            {
                
                $format = '%s/%s';
                
                $descriptionFile = array_pull($data,'description');
                $descriptionsPath = sprintf($format,public_path(),'descriptions');
                $descriptionFileName = $data['title'].'.php';

                $descriptionFileName = strtolower($descriptionFileName);
                $descriptionFileName = str_replace(' ','-',$descriptionFileName);

                $descriptionFilePath = sprintf($format,$descriptionsPath,$descriptionFileName);
            
                $format = '%s%s';

                $path = sprintf($format,public_path(),$activity->description_url);
                
                \Log::info($path);
                \File::delete($path);

                $format = '/descriptions/%s';
                $relativePath = sprintf($format,$descriptionFileName);
                $data = array_add($data,'description_url',$relativePath);
                
                \Log::info($descriptionFileName);    
                $descriptionFile->move($descriptionsPath,$descriptionFileName);
            }
                        
            $this->activityRepo->update($activity,$data);
    
            \DB::commit();

            $listener->setMsg('messages.entity_update_success',['name'=>$data['title']]);

            return true;
        }

        
        catch(\Exception $ex)
        {
            \Log::error($ex);
            \DB::rollback();
            $listener->setMsg('messages.entity_update_failure',['name'=>$data['title']]);
            return false;
        }
    }



    public function destroy($id,$listener = null)
    {   
        $activity = null;

        try
        {
            $activity = $this->find($id);

            $publicPath = public_path();
            
            $format = '%s%s';
            $relativePath = $activity->activity_url;
            $activityPath = sprintf($format,$publicPath,$relativePath);
            
            $relativePath = $activity->description_url;
            $descriptionPath = sprintf($format,$publicPath,$relativePath);

            \File::delete([$activityPath,$descriptionPath]);
            
            $this->activityRepo->destroy($id);
            
            if( ! is_null($listener) )
            {
                $listener->setMsg('messages.entity_delete_success',['name'=>$activity->title]);
            }

            return true;
        }

        catch(\Exception $ex)
        {
            \Log::error($ex);

            if( ! is_null($listener) )
            {
                $listener->setMsg('messages.entity_delete_failure',['name'=>$activity->title]);
            }


            return false;
        }
    }

    public function find($id)
    {
        return $this->activityRepo->getById($id);
    }
}
