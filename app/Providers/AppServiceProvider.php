<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use View;
use App\RegistrationRequest;
use App\FriendRequest;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot()
    {
        $reqNum = RegistrationRequest::all();
        View::share('regReqNum', count($reqNum));
    }

    /**
     * Register any application services.
     *
     * @return void
     */
    public function register()
    {
        //
    }
}
