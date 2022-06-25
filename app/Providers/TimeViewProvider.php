<?php
 
namespace App\View\Composers;
 
use Illuminate\View\View;
use Illuminate\Support\ServiceProvider;
use Illuminate\Support\Carbon;

class TimeViewProvider extends ServiceProvider
{

    public function boot()
    {
        // Used to sole the issue with subtemplates and time values
        View::composer('*', function ($view) {
            return $view->with('time', ['time' => Carbon::now()->format('H:i:s')]);
        });
    }
}