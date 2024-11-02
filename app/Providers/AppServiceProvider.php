<?php

namespace App\Providers;

use App\Repositories\Contracts\Admin\EventRepositoryInterface;
use App\Services\Contracts\EventServiceInterface;
use App\Repositories\Admin\EventRepository;
use App\Services\Admin\EventService;
use Illuminate\Support\ServiceProvider;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     */
    public function register(): void
    {
        //Admin services
        $this->app->bind(EventRepositoryInterface::class, EventRepository::class);
        $this->app->bind(EventServiceInterface::class, EventService::class);
    }

    /**
     * Bootstrap any application services.
     */
    public function boot(): void
    {
        view()->composer('admin.*', function ($view) {
            $view->with(['perPageItems' => [10, 25, 50, 100]]);
        });
    }
}
