<?php

namespace App\Providers;

use App\Repositories\Contracts\Admin\EventRepositoryInterface;
use App\Services\Contracts\Admin\EventReminderServiceInterface;
use App\Repositories\Admin\EventRepository;
use App\Services\Admin\EventReminderService;
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
        $this->app->bind(EventRepositoryInterface::class, EventRepository::class);
        $this->app->bind(EventReminderServiceInterface::class, EventReminderService::class);
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
