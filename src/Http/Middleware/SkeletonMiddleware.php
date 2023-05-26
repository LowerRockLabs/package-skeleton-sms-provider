<?php

namespace VendorName\Skeleton\Http\Middleware;

use Closure;
use Illuminate\Http\Response;

class SkeletonMiddleware
{
    /**
     * Specify any validation for verifying that the SMS/Delivery report has come from the provider
     */
    public function handle($request, Closure $next)
    {
        return $next($request);
    }
}
