<?php

namespace Lavalite\Calendar\Providers;

use Illuminate\Support\ServiceProvider;

class CalendarServiceProvider extends ServiceProvider {

    /**
     * Indicates if loading of the provider is deferred.
     *
     * @var bool
     */
    protected $defer = false;

    /**
     * Bootstrap the application events.
     *
     * @return void
     */
    public function boot()
    {
        $this->loadViewsFrom(__DIR__.'/../../../../resources/views', 'calendar');
        $this->loadTranslationsFrom(__DIR__.'/../../../../resources/lang', 'calendar');

        $this->publishResources();
        $this->publishMigrations();

        include __DIR__ . '/../Http/routes.php';
    }

    /**
     * Register the service provider.
     *
     * @return void
     */
    public function register()
    {
        $this->app->bind('calendar', function ($app) {
            return $this->app->make('Lavalite\Calendar\Calendar');
        });

        $this->app->bind(
            'Lavalite\\Calendar\\Interfaces\\CalendarRepositoryInterface',
            'Lavalite\\Calendar\\Repositories\\Eloquent\\CalendarRepository'
        );

    }

    /**
     * Get the services provided by the provider.
     *
     * @return array
     */
    public function provides()
    {
        return array('calendar');
    }

    /**
     * Publish config, views.
     *
     * @return  void
     */
    private function publishResources()
    {
        $this->publishes([__DIR__.'/../../../../config/config.php' => config_path('package/calendar.php')], 'config');

    }

    /**
     * Publish migration and seeds.
     *
     * @return  void
     */
    private function publishMigrations()
    {
        $this->publishes([__DIR__.'/../../../../database/migrations/' => base_path('database/migrations')], 'migrations');
        $this->publishes([__DIR__.'/../../../../database/seeds/' => base_path('database/seeds')], 'seeds');
    }


}
