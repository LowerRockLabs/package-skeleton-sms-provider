<?php

use Illuminate\Support\Facades\Route;

Route::group(['middleware' => 'web'], function () {
        
        // Get SMS Response
        Route::post('/smsresponse/Skeleton', '\VendorName\Skeleton\Http\Controllers\SkeletonResponseController@updateMessageStatus');
        
        // Inbound SMS
        Route::post('/inboundsms/Skeleton', '\VendorName\Skeleton\Http\Controllers\InboundSMS\SkeletonInboundSMSController@inboundMessage');

});
