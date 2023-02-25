<?php

namespace App\Providers;

use App\Entities\Library;
use App\Repositories\LibraryRepository;
use Doctrine\ORM\EntityManager;
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
    }

    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot()
    {
        //
    }
}
