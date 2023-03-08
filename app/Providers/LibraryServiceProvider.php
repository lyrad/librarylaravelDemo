<?php

namespace App\Providers;

use App\Contracts\LibraryServiceInterface;
use App\Entities\Library;
use App\Repositories\LibraryRepository;
use App\Services\LibraryService;
use Doctrine\ORM\EntityManager;
use Doctrine\ORM\EntityManagerInterface;
use Illuminate\Support\ServiceProvider;

class LibraryServiceProvider extends ServiceProvider
{
    public function register(): void
    {
        $this->app->bind(LibraryServiceInterface::class, LibraryService::class);

        $this->app->bind(LibraryRepository::class, function($app) {
            $entityManager = $app[EntityManagerInterface::class];
            return $entityManager->getRepository(Library::class);
        });
    }

    public function boot(): void
    {
        //
    }
}
