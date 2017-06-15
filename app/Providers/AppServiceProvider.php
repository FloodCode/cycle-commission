<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot()
    {
        $host = request()->getHttpHost();
        $re = '/(uk|en|ru|translate)\..+/';
        preg_match($re, $host, $matches);

        if (count($matches))
        {
            $locale = $matches[1] === 'translate' ? 'ach' : $matches[1];
            app()->setLocale($locale);
        }
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
