<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use App\Models\Course;
use App\Observers\CourseObserver;

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
        $this->registerModelObservers();
    }

    /**
     * The model observers to register.
     *
     * @return void
     */
    protected function registerModelObservers()
    {
        Course::observe(CourseObserver::class);
    }
}
