<?php
namespace Serega170584\Subschannels;

use Illuminate\Support\ServiceProvider;

class SubschannelsServiceProvider extends ServiceProvider
{

    public function register()
    {
        $this->mergeConfigFrom(__DIR__ . '/../config/subschannels.php', 'subschannels');

        $this->app->bind('subschannels', function () {
            return new Subschannels;
        });
    }

    public function boot(){
        $this->loadViewsFrom(__DIR__ . '/../resources/views/', 'subschannels');
        $this->publishes([
            __DIR__ . '/../database/migrations' => $this->app->databasePath() . '/migrations'
        ], 'migrations');
        require __DIR__ . '/Http/routes.php';
    }

}