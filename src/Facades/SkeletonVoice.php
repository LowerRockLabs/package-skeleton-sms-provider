<?php

namespace VendorName\Skeleton\Facades;

use Illuminate\Support\Facades\Facade;

/**
 * @see \VendorName\Skeleton\Skeleton
 */
class SkeletonVoice extends Facade
{
    protected static function getFacadeAccessor()
    {
        return \VendorName\Skeleton\SkeletonVoiceGateway::class;
    }
}
