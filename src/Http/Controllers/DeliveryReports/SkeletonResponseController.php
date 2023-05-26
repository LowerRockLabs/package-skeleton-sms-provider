<?php

namespace VendorName\Skeleton\Http\Controllers\DeliveryReports;

use Illuminate\Support\Facades\Log;
use LowerRockLabs\LaravelSMSManager\Models\SmsMessage;

class SkeletonResponseController extends \App\Http\Controllers\Controller
{
    /**
     * Used if you have middleware to validate that the request has come from the provider
     */
    public function __construct()
    {
        $this->middleware('Skeletonmw');
    }

    /**
     * Update Message Status
     * 
     * @return mixed
     */
    public function updateMessageStatus()
    {
    }
}
