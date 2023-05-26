<?php

namespace VendorName\Skeleton;

use Illuminate\Foundation\Console\AboutCommand;
use Illuminate\Routing\Router;
use Illuminate\Support\ServiceProvider;
use VendorName\Skeleton\Http\Middleware\SkeletonMiddleware;
use VendorName\Skeleton\Providers\EventServiceProvider;

class SkeletonServiceProvider extends ServiceProvider
{
    /**
     * @return void
     */
    public function boot()
    {
        // Middleware - Only Needed if In Use
        $router = $this->app->make(Router::class);
        $router->aliasMiddleware('Skeletonmw', SkeletonMiddleware::class);

        // Load Routes For Inbound SMS and Delivery Reports
        $this->loadRoutesFrom(__DIR__.'/../routes/web.php');

        // Load Config
        $this->mergeConfigFrom(
            __DIR__.'/../config/config.php', 'lrlSMSManager'
        );

        // About Command
        AboutCommand::add('SMS Provider - Skeleton', fn () => ['Version' => '1.0.0']);

    }

    /**
     * @return void
     */
    public function register()
    {
        // Bind Facade
        $this->app->bind('Skeletonsmsgateway', function ($app) {
            return new SkeletonSmsGateway();
        });

        // Register Event Provider
        $this->app->register(EventServiceProvider::class);

        // Merge Config with lrlSMSManager Core
        $this->mergeConfigFrom(__DIR__.'/../config/config.php', 'lrlSMSManager');
    }
}
