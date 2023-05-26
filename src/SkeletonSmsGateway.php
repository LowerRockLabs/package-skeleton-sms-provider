<?php

namespace VendorName\Skeleton;

use Exception;
use Illuminate\Support\Facades\Log;
use LowerRockLabs\LaravelSMSManager\Models\SmsPrice;
use LowerRockLabs\LaravelSMSManager\Events\SMSDeliveryFailureEvent;
use LowerRockLabs\LaravelSMSManager\Traits\HasGatewayMethods;

class SkeletonSmsGateway implements \LowerRockLabs\LaravelSMSManager\Traits\MFA\SMSGateways\SmsGatewayInterface
{
    use HasGatewayMethods;

    /**
     * The class constructor
     */
    public function __construct()
    {
        $this->providerName = 'Skeleton';
        $this->senderName = config('lrlSMSManager.Skeleton.SEND_SMS_FROM');

    }

    /**
     * The function to dispatch the SMS
     */
    public function dispatchSms()
    {
        // Your Custom Code Here
    }


    /**
     * The function to get response from Skeleton API
     */
    public function getResponseData()
    {
        Log::debug('Skeleton - SkeletonSmsGateway: getResponseData Start');

    }

    /**
     * Used for setting up Line Intel (Line Type)
     * @return array<mixed>
     */
    public function setupLineIntel(string $phoneNumber): array
    {
        Log::debug('Skeleton - SkeletonSmsGateway: setupLineIntel Start');

        return [
        ];
    }

    /**
     * Get the status of a message based on the Message ID - this can be taken from sendSMS or from a history report
     *
     * @return array|mixed
     */
    public function getMessageStatus($messageid)
    {
        Log::debug('Skeleton - SkeletonSmsGateway: getMessageStatus Start');

        return 'Delivered';
    }

    /**
     * Used to get Current Prices
     */
    public function getCurrentPrices(array $countries): void
    {
        Log::debug('Skeleton - SkeletonSmsGateway: getCurrentPrices Start');

    }

}
