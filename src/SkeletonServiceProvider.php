<?php

namespace VendorName\Skeleton;

use Illuminate\Foundation\Console\AboutCommand;
use Illuminate\Routing\Router;
use Illuminate\Support\ServiceProvider;
use VendorName\Skeleton\Http\Middleware\SkeletonMiddleware;

class SkeletonServiceProvider extends ServiceProvider
{
    /**
     * @return void
     */
    public function boot()
    {
        $router = $this->app->make(Router::class);
        $router->aliasMiddleware('Skeletonmw', SkeletonMiddleware::class);

        /*
         * Optional methods to load package assets
         */

        $this->loadRoutesFrom(__DIR__.'/../routes/web.php');
        $this->mergeConfigFrom(
            __DIR__.'/../config/config.php', 'Skeleton'
        );

        // $this->loadTranslationsFrom(__DIR__ . '/../resources/lang', 'laravel-advanced-authentication');
        AboutCommand::add('SMS Provider - Skeleton', fn () => ['Version' => '1.0.0']);

        if ($this->app->runningInConsole()) {

            $this->publishes([
                __DIR__.'/../config/config.php' => config_path('Skeleton.php'),
            ], 'lrl-sms-Skeleton-config');

        }
    }

    /**
     * @return void
     */
    public function register()
    {
        $this->app->bind('Skeletonsmsgateway', function ($app) {
            return new SkeletonSmsGateway();
        });

        $this->mergeConfigFrom(__DIR__.'/../config/config.php', 'Skeleton');
    }
}
