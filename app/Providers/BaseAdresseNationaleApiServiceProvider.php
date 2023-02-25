<?php

namespace App\Providers;

use App\Contracts\BaseAdresseNationaleApiServiceInterface;
use App\Services\BaseAdresseNationaleApiService;
use Illuminate\Support\ServiceProvider;

class BaseAdresseNationaleApiServiceProvider extends ServiceProvider
{
    /**
     * Register services.
     */
    public function register(): void
    {
        $this->app->bind(BaseAdresseNationaleApiServiceInterface::class, BaseAdresseNationaleApiService::class);
    }

    /**
     * Bootstrap services.
     */
    public function boot(): void
    {
        //
    }
}
