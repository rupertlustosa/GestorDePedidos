<?php

namespace Modules\Order\Providers;

use Config;
use Illuminate\Database\Eloquent\Factory;
use Illuminate\Support\ServiceProvider;

class OrderServiceProvider extends ServiceProvider
{
    /**
     * Boot the application events.
     *
     * @return void
     */
    public function boot()
    {

        $this->registerTranslations();
        $this->registerConfig();
        $this->registerViews();
        $this->registerFactories();
        $this->loadMigrationsFrom(base_path() . '/Modules/Order/Database/Migrations');

    }

    /**
     * Register translations.
     *
     * @return void
     */
    public function registerTranslations()
    {
        $langPath = resource_path('lang/modules/order');

        if (is_dir($langPath)) {
            $this->loadTranslationsFrom($langPath, 'order');
        } else {
            $this->loadTranslationsFrom(base_path() . '/Modules/Order/Resources/lang', 'order');
        }
    }

    /**
     * Register config.
     *
     * @return void
     */
    protected function registerConfig()
    {
        $this->publishes([
            base_path() . '/Modules/Order/Config/config.php' => config_path('order.php'),
        ], 'config');
        $this->mergeConfigFrom(
            base_path() . '/Modules/Order/Config/config.php', 'order'
        );
    }

    /**
     * Register views.
     *
     * @return void
     */
    public function registerViews()
    {
        $viewPath = resource_path('views/modules/order');

        $sourcePath = base_path() . '/Modules/Order/Resources/views';

        $this->publishes([
            $sourcePath => $viewPath
        ], 'views');

        $this->loadViewsFrom(array_merge(array_map(function ($path) {
            return $path . '/modules/order';
        }, Config::get('view.paths')), [$sourcePath]), 'order');
    }

    /**
     * Register an additional directory of factories.
     *
     * @return void
     */
    public function registerFactories()
    {
        if (!app()->environment('production') && $this->app->runningInConsole()) {
            app(Factory::class)->load(base_path() . '/Modules/Order/Database/factories');
        }
    }

    /**
     * Register the service provider.
     *
     * @return void
     */
    public function register()
    {
        $this->app->register(RouteServiceProvider::class);
    }

    /**
     * Get the services provided by the provider.
     *
     * @return array
     */
    public function provides()
    {
        return [];
    }
}
