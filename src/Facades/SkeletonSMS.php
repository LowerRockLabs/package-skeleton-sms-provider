<?php

namespace VendorName\Skeleton\Facades;

use Illuminate\Support\Facades\Facade;

/**
 * @see \VendorName\Skeleton\Skeleton
 */
class SkeletonSMS extends Facade
{
    protected static function getFacadeAccessor()
    {
        return \VendorName\Skeleton\SkeletonSmsGateway::class;
    }
}
