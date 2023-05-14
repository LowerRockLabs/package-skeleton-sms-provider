<?php

namespace VendorName\Skeleton;

use Illuminate\Support\Facades\Log;
use LowerRockLabs\LaravelPhoneNumbers\Models\PhoneNumber;
use LowerRockLabs\LaravelSMSManager\Traits\LogsVoice;
use LowerRockLabs\LaravelSMSManager\Models\SmsPrice;

class SkeletonVoiceGateway implements \LowerRockLabs\LaravelSMSManager\Traits\VoiceGateways\VoiceGatewayInterface
{
    use LogsVoice;

    protected $client;
    protected string $voice_from;
    protected string $voiceCallbackURL;
    private $_response;


    /**
     * The class constructor
     */
    public function __construct()
    {
    }

    /**
     * The function to send sms using Skeleton API
     *
     * @param String $recipientPhoneNumber  The recipient number
     * @param String $message The sms message
     *
     * @return mixed The response from API
     */
    public function sendMessage($recipientPhoneNumber,$message)
    {

    }

    /**
     * The function to get response from Skeleton API
     *
     * @return ResponseData
     */
    public function getResponseData():ResponseData
    {
    }
    


    /**
     * @param string $phoneNumber
     * 
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
