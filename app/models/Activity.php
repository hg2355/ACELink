<?php namespace TT\Models;

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
}
