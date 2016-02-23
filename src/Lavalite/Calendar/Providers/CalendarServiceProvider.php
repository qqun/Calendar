<?php

namespace Lavalite\Calendar\Providers;

use Illuminate\Support\ServiceProvider;
use Lavalite\Calendar\Models\Calendar;
class CalendarServiceProvider extends ServiceProvider
{
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
            \Lavalite\Calendar\Interfaces\CalendarRepositoryInterface::class,
            \Lavalite\Calendar\Repositories\Eloquent\CalendarRepository::class
        );

        $this->app->register(\Lavalite\Calendar\Providers\AuthServiceProvider::class);
        $this->app->register(\Lavalite\Calendar\Providers\EventServiceProvider::class);
        $this->app->register(\Lavalite\Calendar\Providers\RouteServiceProvider::class);
    }

    /**
     * Get the services provided by the provider.
     *
     * @return array
     */
    public function provides()
    {
        return ['calendar'];
    }

    /**
     * Publish config, views.
     *
     * @return void
     */
    private function publishResources()
    {
         // Publish configuration file
        $this->publishes([__DIR__.'/../../../../config/config.php' => config_path('package/calendar.php')], 'config');

        // Publish public view
        $this->publishes([__DIR__.'/../../../../resources/views/public' => base_path('resources/views/vendor/calendar/public')], 'view-public');

        // Publish admin view
        $this->publishes([__DIR__.'/../../../../resources/views/admin' => base_path('resources/views/vendor/calendar/admin')], 'view-admin');

        // Publish language files
        $this->publishes([__DIR__.'/../../../../resources/lang' => base_path('resources/lang/vendor/calendar')], 'lang');

        // Publish migrations
        $this->publishes([__DIR__.'/../../../../database/migrations' => base_path('database/migrations')], 'migrations');

        // Publish seeds
        $this->publishes([__DIR__.'/../../../../database/seeds' => base_path('database/seeds')], 'seeds');
    }

   
}
