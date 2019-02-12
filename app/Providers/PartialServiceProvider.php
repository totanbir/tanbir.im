<?php

namespace App\Providers;
use App\Message;

use Illuminate\Support\ServiceProvider;

class PartialServiceProvider extends ServiceProvider
{
    /**
     * Bootstrap services.
     *
     * @return void
     */
    public function boot()
    {
        $this->sms();
    }

    /**
     * Register services.
     *
     * @return void
     */
    public function register()
    {
        //
    }

    protected function sms(){
            view()->composer('*', function($view){
                $view->with('SmsData', ['messages'=>Message::where('status', 0)->orderBy('created_at', 'desc')->take(5)->get()]);
            });
    }
}
