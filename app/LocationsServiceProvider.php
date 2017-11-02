<?php

namespace Bpocallaghan\Locations;

use Illuminate\Support\ServiceProvider;
use Bpocallaghan\Locations\Commands\PublishCommand;

class LocationsServiceProvider extends ServiceProvider
{
    /**
     * Bootstrap the application events.
     *
     * @return void
     */
    public function boot()
    {
        $this->loadViewsFrom(__DIR__ . '/../resources/views/admin', 'admin.locations');
        $this->loadViewsFrom(__DIR__ . '/../resources/views/website', 'website.locations');

        $this->registerCommand(PublishCommand::class, 'publish');
    }

    /**
     * Register a singleton command
     *
     * @param $class
     * @param $command
     */
    private function registerCommand($class, $command)
    {
        $path = 'bpocallaghan.locations.commands.';
        $this->app->singleton($path . $command, function ($app) use ($class) {
            return $app[$class];
        });

        $this->commands($path . $command);
    }
}
