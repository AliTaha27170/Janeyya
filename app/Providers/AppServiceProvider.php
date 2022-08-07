<?php

namespace App\Providers;

use App\Firm;
use App\User;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\ServiceProvider;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     *
     * @return void
     */
    public function register()
    {
        //
    }

    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot()
    {
        
       
            view()->composer('*', function ($view) 
            {
                if (Auth::check()) {
                    $firm_id = User::where('id', '=',Auth::user()->id)->select('firm_id')->first();
                    $logo = Firm::where('id',$firm_id->firm_id)->select('logo')->first();
                    //...with this variable
                    $view->with('logo', $logo );   
                } 
            });  
        
    }
}
