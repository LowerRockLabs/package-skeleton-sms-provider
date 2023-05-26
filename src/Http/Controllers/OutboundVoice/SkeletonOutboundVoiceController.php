<?php

namespace VendorName\Skeleton\Http\Controllers\OutboundVoice;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;

class SkeletonOutboundVoiceController extends \App\Http\Controllers\Controller
{
    public $url;

    public $from;

    public $request;

    public $response;

    /**
     * Used to Validate that the request has come from the provider
     */
    public function checkSecurity(Request $request)
    {

    }

    // Greeting Test
    public function Greeting(Request $request)
    {
    }
}
