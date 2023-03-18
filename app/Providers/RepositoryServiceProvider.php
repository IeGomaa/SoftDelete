<?php

namespace App\Providers;

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
        $this->app->bind(
            'App\Http\Interfaces\AuthInterface',
            'App\Http\Repositories\AuthRepository'
        );
        $this->app->bind(
            'App\Http\Interfaces\CommentInterface',
            'App\Http\Repositories\CommentRepository'
        );
        $this->app->bind(
            'App\Http\Interfaces\ErrorInterface',
            'App\Http\Repositories\ErrorRepository'
        );
        $this->app->bind(
            'App\Http\Interfaces\HomeInterface',
            'App\Http\Repositories\HomeRepository'
        );
        $this->app->bind(
            'App\Http\Interfaces\PostInterface',
            'App\Http\Repositories\PostRepository'
        );
        $this->app->bind(
            'App\Http\Interfaces\UserInterface',
            'App\Http\Repositories\UserRepository'
        );
    }

    /**
     * Bootstrap services.
     *
     * @return void
     */
    public function boot()
    {
        //
    }
}
