<?php namespace TT\Service;

use App;
use View;
use Sentry;
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

    public function create($data, $listener)
    {
        if( is_null($listener) )
            return false;
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

    public function find($id)
    {
        return $this->activityRepo->getById($id);
    }
}
