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

    public function checkSecurity(Request $request)
    {

    }

    // Greeting Test
    public function Greeting(Request $request)
    {
    }
}
