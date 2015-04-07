<?php namespace TT\Support;

abstract class EventHandler
{
    public function handle()
    {
        try
        {
            return call_user_func_array([$this,'handler'], func_get_args());
        }

        catch(\Exception $ex)
        {
            \Log::error($ex);
            return false;
        }
    }
}
