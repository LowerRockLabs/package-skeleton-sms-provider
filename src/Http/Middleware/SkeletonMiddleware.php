<?php

namespace VendorName\Skeleton\Http\Middleware;

use Closure;
use Illuminate\Http\Response;

class SkeletonMiddleware
{
    public function handle($request, Closure $next)
    {
        return $next($request);
    }
}
