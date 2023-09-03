<?php

namespace Modules\Petcare\Providers;

use Illuminate\Support\ServiceProvider;
use Modules\Petcare\Interfaces\ServiceRepositoryInterface;
use Modules\Petcare\Repositories\ServiceRepository;

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
        $this->app->bind(ServiceRepositoryInterface::class, ServiceRepository::class);

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
