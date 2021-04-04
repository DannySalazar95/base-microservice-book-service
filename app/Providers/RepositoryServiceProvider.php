<?php

namespace App\Providers;

use App\Repositories\Book\BookEloquentRepository;
use App\Repositories\Book\BookRepositoryInterface;
use Illuminate\Support\ServiceProvider;

class RepositoryServiceProvider extends ServiceProvider
{
    /**
     * Register services.
     *
     * @return void
     */
    public function register()
    {
        //
    }

    /**
     * Bootstrap services.
     *
     * @return void
     */
    public function boot()
    {
        $this->app->bind(BookRepositoryInterface::class, BookEloquentRepository::class);
    }
}
