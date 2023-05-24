<?php

namespace VendorName\Skeleton;

use Exception;
use Illuminate\Support\Facades\Log;
use LowerRockLabs\LaravelSMSManager\Facades\SmsLogger;
use LowerRockLabs\LaravelSMSManager\Models\SmsPrice;

class SkeletonSmsGateway implements \LowerRockLabs\LaravelSMSManager\Traits\MFA\SMSGateways\SmsGatewayInterface
{

    protected string $phoneNumber;

    protected string $message;

    protected string $senderName;

    protected string $providerName;

    /**
     * The class constructor
     */
    public function __construct()
    {
        $this->providerName = 'Skeleton';
        $this->senderName = config('lrlSMSManager.provider-Skeleton.SEND_SMS_FROM');


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

    protected function checkPhoneNumber(): bool
    {
        if (empty($this->phoneNumber)) {
            Log::error('SMSLog - Empty phoneNumber');
            throw new Exception('Empty phoneNumber');
        }

        return true;
    }

    public function setSenderName(string $senderName): self
    {
        $this->senderName = $senderName;

        return $this;
    }

    public function getSenderName(): string
    {
        return $this->senderName ?? '';
    }

    public function checkSenderName(): bool
    {
        if (empty($this->senderName)) {
            Log::error('SMSLog - Empty sender name');
            throw new Exception('Empty sender name');
        }

        return true;
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

    public function checkMessage(): bool
    {
        if (empty($this->message)) {
            Log::error('SMSLog - Empty message');
            throw new Exception('Empty message');
        }

        return true;
    }

    /**
     * The function to send sms using Skeleton API
     *
     * @param  string  $smsTo      The recipient number
     * @param  string  $message The sms message
     * @return mixed The response from API
     */
    public function sendSms($smsTo = null, $message = null, string $messageID = null)
    {
        if (! is_null($smsTo)) {
            $this->phoneNumber = $smsTo;
        }
        if (! is_null($message)) {
            $this->message = $message;
        }

        if ($this->checkPhoneNumber() && $this->checkMessage() && $this->checkSenderName()) {
            // Send Message

            // Update Log
            if (is_null($messageID)) {
                $messageID = SmsLogger::setRecipient($this->phoneNumber)->setSender($this->senderName)->setMessage($this->message)->setMessageStatus('Sent to Provider')->setProviderName($this->providerName)->setMessageSid($uniqueID)->logMessage();
            } else {
                $message = SmsLogger::setMessageID($messageID)->setProviderName($this->providerName)->setSender($this->senderName)->setMessageStatus('Sent to Provider')->updateMessage();
            }
            return $messageID;

        } else {
            return false;
        }


    }

    /**
     * The function to get response from Skeleton API
     */
    public function getResponseData()
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

    /**
     * Get the status of a message based on the Message ID - this can be taken from sendSMS or from a history report
     *
     * @return array|mixed
     */
    public function getMessageStatus($messageid)
    {
        return 'Unknown';
    }

    public function getCurrentPrices(array $countries): void
    {

    }
}
