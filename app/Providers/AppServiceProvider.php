<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use Illuminate\Pagination\Paginator;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     */
    public function register(): void
    {
        //Admin services
        $this->app->bind(
            \App\Repositories\Contracts\Admin\EventRepositoryInterface::class,
            \App\Repositories\Admin\EventRepository::class
        );
        $this->app->bind(
            \App\Services\Contracts\Admin\EventReminderServiceInterface::class,
            \App\Services\Admin\EventReminderService::class
        );

        //Api services
        $this->app->bind(
            \App\Repositories\Contracts\Api\EventRepositoryInterface::class,
            \App\Repositories\Api\EventRepository::class
        );
    }

    /**
     * Bootstrap any application services.
     */
    public function boot(): void
    {
        view()->composer('admin.*', function ($view) {
            $view->with(['perPageItems' => [10, 25, 50, 100]]);
        });
        Paginator::useBootstrap();
    }
}
