<?php

namespace VendorName\Skeleton;

use LowerRockLabs\LaravelSMSManager\Models\SmsPrice;
use LowerRockLabs\LaravelSMSManager\Traits\LogsSMS;

class SkeletonSmsGateway implements \LowerRockLabs\LaravelSMSManager\Traits\MFA\SMSGateways\SmsGatewayInterface
{
    use LogsSMS;

    protected $client;

    protected $message_from;

    private $_response;

    /**
     * The class constructor
     */
    public function __construct()
    {
        $this->providerName = 'Skeleton';

    }

    /**
     * The function to send sms using Skeleton API
     *
     * @param  string  $smsTo      The recipient number
     * @param  string  $message The sms message
     * @return mixed The response from API
     */
    public function sendSms($smsTo, $message)
    {
    }

    /**
     * The function to get response from Skeleton API
     */
    public function getResponseData(): ResponseData
    {
    }

    /**
     * @return array<mixed>
     */
    public function setupLineIntel(string $phoneNumber): array
    {

        return [
        ];
    }

    public function getCurrentPrices(array $countries): void
    {

    }
}
