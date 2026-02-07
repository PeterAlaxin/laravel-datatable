<?php

namespace PeterAlaxin\DataTable;

use Illuminate\Support\ServiceProvider;

class DataTableServiceProvider extends ServiceProvider
{
    public function register(): void
    {
        $this->mergeConfigFrom(__DIR__.'/../config/datatable.php', 'datatable');
    }

    public function boot(): void
    {
        $this->loadViewsFrom(__DIR__.'/../resources/views', 'datatable');
        $this->loadTranslationsFrom(__DIR__.'/../lang', 'datatable');
        $this->loadMigrationsFrom(__DIR__.'/../database/migrations');

        if ($this->app->runningInConsole()) {
            $this->publishes([
                __DIR__.'/../config/datatable.php' => config_path('datatable.php'),
            ], 'datatable-config');

            $this->publishes([
                __DIR__.'/../resources/views' => resource_path('views/vendor/datatable'),
            ], 'datatable-views');

            $this->publishes([
                __DIR__.'/../database/migrations' => database_path('migrations'),
            ], 'datatable-migrations');

            $this->publishes([
                __DIR__.'/../lang' => $this->app->langPath('vendor/datatable'),
            ], 'datatable-lang');
        }
    }
}
