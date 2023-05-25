<?php

namespace VendorName\Skeleton\Providers;

use Illuminate\Foundation\Support\Providers\EventServiceProvider as ServiceProvider;
use VendorName\Skeleton\Subscribers\MessageSubscriber;

class EventServiceProvider extends ServiceProvider
{
    protected $listen = [
    ];

    /**
     * The subscriber classes to register.
     *
     * @var array
     */
    protected $subscribe = [
        MessageSubscriber::class,
    ];

    /**
     * Register any events for your application.
     *
     * @return void
     */
    public function boot()
    {
        parent::boot();
    }
}
