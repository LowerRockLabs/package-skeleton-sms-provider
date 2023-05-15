<?php

namespace VendorName\Skeleton;

use Exception;
use Illuminate\Support\Facades\Log;
use LowerRockLabs\LaravelSMSManager\Facades\SmsLogger;
use LowerRockLabs\LaravelSMSManager\Models\SmsPrice;

class SkeletonSmsGateway implements \LowerRockLabs\LaravelSMSManager\Traits\MFA\SMSGateways\SmsGatewayInterface
{
    protected $client;

    protected $message_from;

    private $_response;

    protected string $phoneNumber;
    protected string $message;

    /**
     * The class constructor
     */
    public function __construct()
    {
        $this->providerName = 'Skeleton';

    }

    public function setPhoneNumber(string $phoneNumber): self
    {
        $this->phoneNumber = $phoneNumber;
        return $this;
    }

    public function getPhoneNumber(): string
    {
        return $this->phoneNumber ?? '';
    }

    public function setMessage(string $message): self
    {
        $this->message = $message;
        return $this;
    }

    public function getMessage(): string
    {
        return $this->message ?? '';
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
        if (!is_null($smsTo))
        {
            $this->phoneNumber = $smsTo;
        }
        if (!is_null($message))
        {
            $this->message = $message;
        }

        $sender = config('Skeleton.SEND_SMS_FROM');


        SmsLogger::setRecipient($this->phoneNumber)->setSender($sender)->setMessage($this->message)->setProviderName("Skeleton")->setMessageSid($uniqueID)->logMessage();
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
