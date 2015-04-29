<?php namespace TT\Models;

use TT\Models\Student;

class Activity extends \Eloquent
{
    protected $table = 'activities';
    
    protected $fillable = ['title','description_url','activity_url','time'];

    public function avgRating()
    {
        try
        {
            $rating = \DB::table('activities_ratings')->where('activity_id','=',$this->id)->first();
            $avg = $rating->count <= 0 ? 0 : $rating->total/$rating->count;

            return $avg;
        }

        catch(\Exception $ex)
        {
            return 0;
        }
    }

    public function q1Percent()
    {
        try
        {
            $total = \DB::table('activities_surveys')->where('activity_id','=',$this->id)->count();

            if( $total === 0 )
                return 0;

            $funCount = \DB::table('activities_surveys')->where('activity_id','=',$this->id)
                                                        ->where('q1','=',1)->count();
            
            return bcdiv($funCount,$total,3)*100;
        }

        catch(\Exception $ex)
        {
            \Log::error($ex);
            return 0;
        }
    }

    public function q2Percent()
    {
        try
        {
            $total = \DB::table('activities_surveys')->where('activity_id','=',$this->id)->count();

            if( $total === 0)
                return 0;

            $appropriateCount = \DB::table('activities_surveys')->where('activity_id','=',$this->id)
                                                                ->where('q2','=',1)->count();
            return bcdiv($appropriateCount,$total,1)*100;

        }

        catch(\Exception $ex)
        {
            \Log::error($ex);
            return 0;
        }
    }

    public function finishedPercent()
    {
        try
        {
            $students = Student::where('traits_type','=','TT\Models\StudentTrait')->select('id');

            $studentsFinished = \DB::table('users_activities')->select('id')->distinct();

            $total = bcdiv(count($students),count($studentsFinished),3)*100;

            return $total;
        }

        catch(\Exception $ex)
        {
            \Log::error($ex);
            return 0;
        }

    }     
    
}
