<?php

namespace App\Providers;

use Illuminate\Support\Arr;
use Illuminate\Support\Carbon;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\ServiceProvider;
use Illuminate\Support\Facades\Schema;

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
        //
        Schema::defaultStringLength(191);

        Validator::extend('dateearliter', function ($attribute, $value, $parameters, $validator) {
            $date_compare = Arr::get($validator->getData(), $parameters[0]);
            return Carbon::parse($date_compare) > Carbon::parse($value);
        });
    }
}
