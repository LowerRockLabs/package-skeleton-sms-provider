<?php

namespace VendorName\Skeleton\Http\Controllers;

use Illuminate\Support\Facades\Log;
use LowerRockLabs\LaravelSMSManager\Models\SmsMessage;

class SkeletonResponseController extends \App\Http\Controllers\Controller
{
    public function __construct()
    {
        $this->middleware('Skeletonmw');
    }

    /**
     * @return mixed
     */
    public function updateMessageStatus()
    {
    }
}
