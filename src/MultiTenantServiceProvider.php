<?php

namespace MHNassar\MultiTenant;

use Illuminate\Support\ServiceProvider;

class MultiTenantServiceProvider extends ServiceProvider
{
    /**
     * Bootstrap the application services.
     *
     * @return void
     */
    public function boot()
    {
        //
        $this->commands('Console.MigrateMultiTenant');
    }

    /**
     * Register the application services.
     *
     * @return void
     */
    public function register()
    {
        //
        $this->registerCommands();
    }

    protected function registerCommands()
    {
        $this->app->singleton('Console.MigrateMultiTenant', function ($app) {

            return new Console\MigrateMultiTenant();
        });
    }

}
