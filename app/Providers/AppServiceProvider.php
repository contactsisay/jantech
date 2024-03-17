<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use App\Models\Common;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     */
    public function register(): void
    {
        //
    }

    /**
     * Bootstrap any application services.
     */
    public function boot(): void
    {     
        //do some routine checks
        Common::crossCheckAnnualLeaveBalance();
    }
}
