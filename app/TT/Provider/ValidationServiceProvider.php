<?php namespace TT\Provider;

use TT\Validator\CustomValidation;
use Illuminate\Support\ServiceProvider;

class ValidationServiceProvider extends ServiceProvider
{
    public function register(){}
        
    public function boot()
    {
        $this->app->validator->resolver(function($translator,$data,$rules,$messages)
        {
           return new CustomValidation($translator,$data,$rules,$messages); 
        });
    }
}

?>
