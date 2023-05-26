<?php

namespace VendorName\Skeleton\Http\Controllers\InboundSMS;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;
use LowerRockLabs\LaravelSMSManager\Jobs\StoreSMSJob;

class SkeletonInboundSMSController extends \App\Http\Controllers\Controller implements \LowerRockLabs\LaravelSMSManager\Interfaces\InboundSMSInterface
{
    protected $requestData;

    /**
     * @return mixed
     */
    public function inboundMessage(Request $request)
    {

    }

    public function isValidRequest(): bool
    {

    }

    /**
     * Used to dispatch the SMS Job
     */
    public function dispatchSMSJob(string $from, string $to, string $body, string $messageID, string $price, string $provider)
    {
        StoreSMSJob::dispatch($from, $to, $body, $messageID, $price, $provider);
    }
}
