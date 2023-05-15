<?php

use Illuminate\Support\Facades\Route;

Route::group(['middleware' => 'web'], function () {
        
        // Skeleton
        Route::post('/smsresponse/Skeleton', '\VendorName\Skeleton\Http\Controllers\SkeletonResponseController@updateMessageStatus');
        
});
