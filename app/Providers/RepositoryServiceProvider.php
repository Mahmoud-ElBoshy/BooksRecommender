<?php

namespace App\Providers;

use App\Contracts\Repositories\BookRepositoryInterface;
use App\Contracts\Repositories\UserRepositoryInterface;
use App\Repositories\BookRepositories;
use App\Repositories\UserRepositories;
use Illuminate\Support\ServiceProvider;

class RepositoryServiceProvider extends ServiceProvider
{
    /**
     * Register services.
     */
    public function register(): void
    {
        $this->app->bind(UserRepositoryInterface::class, UserRepositories::class);
        $this->app->bind(BookRepositoryInterface::class, BookRepositories::class);
    }

    /**
     * Bootstrap services.
     */
    public function boot(): void
    {
        //
    }
}
