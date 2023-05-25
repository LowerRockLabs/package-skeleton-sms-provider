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
        $this->senderName = config('lrlSMSManager.Skeleton.SEND_SMS_FROM');

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
            Log::error('Skeleton - SkeletonSmsGateway - Empty phoneNumber');
            throw new Exception('Skeleton - Empty phoneNumber');
        }
        Log::debug('SkeletonSkeleton - SkeletonSmsGateway: checkPhoneNumber Success');

        return true;
    }

    public function setSenderName(string $senderName): self
    {
        $this->senderName = $senderName;
        Log::debug('Skeleton - SkeletonSmsGateway: setSenderName Success');

        return $this;
    }

    public function getSenderName(): string
    {
        return $this->senderName ?? '';
    }

    public function checkSenderName(): bool
    {
        if (empty($this->senderName)) {
            Log::error('Skeleton - SkeletonSmsGateway - Empty sender name');
            throw new Exception('Skeleton - Empty sender name');
        }
        Log::debug('Skeleton - SkeletonSmsGateway: checkSenderName Success');

        return true;
    }

    public function setMessage(string $message): self
    {
        $this->message = $message;
        Log::debug('Skeleton - SkeletonSmsGateway: setMessage');

        return $this;
    }

    public function getMessage(): string
    {
        return $this->message ?? '';
    }

    public function checkMessage()
    {
        if (empty($this->message)) {
            Log::error('Skeleton - SkeletonSmsGateway - Empty message');
            throw new Exception('Skeleton - Empty message');
        }
        Log::debug('Skeleton - SkeletonSmsGateway: checkMessage success');

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
        Log::debug('Skeleton - SkeletonSmsGateway: sendSms Start');

        if (! is_null($smsTo)) {
            $this->phoneNumber = $smsTo;
        }
        if (! is_null($message)) {
            $this->message = $message;
        }

        if ($this->checkPhoneNumber() && $this->checkMessage() && $this->checkSenderName()) {
            $uniqueID = $this->providerName.'-'.md5($this->senderName.'-'.$this->phoneNumber.'-'.now());

            if (is_null($messageID)) {
                Log::debug('Skeleton - SkeletonSmsGateway - sendSms - No Existing SmsLogger');

                $messageID = SmsLogger::setRecipient($this->phoneNumber)->setSender($this->senderName)->setMessage($this->message)->setMessageStatus('Sent')->setProviderName($this->providerName)->setMessageSid($uniqueID)->logMessage();
            } else {
                Log::debug('Skeleton - SkeletonSmsGateway - sendSms - Update Existing SmsLogger');
                $message = SmsLogger::setMessageID($messageID)->setProviderName($this->providerName)->setSender($this->senderName)->setMessageStatus('Sent')->updateMessage();
            }
            Log::info('-------');
            Log::info('SMS Sent using Log Only');
            Log::info('smsTo:'.$this->phoneNumber);
            Log::info('messageFrom:'.$this->senderName);
            Log::info('message:'.$this->message);
            Log::info('sid:'.$uniqueID);
            Log::info('MessageID:'.$messageID);
            Log::info('-------');

            return $messageID;

        } else {
            Log::error('Skeleton - SkeletonSmsGateway: Failed to Send Message');

            return false;
        }

    }

    /**
     * The function to get response from LaravelSmsTextlocal API
     */
    public function getResponseData()
    {
        Log::debug('Skeleton - SkeletonSmsGateway: getResponseData Start');

    }

    /**
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

    public function getCurrentPrices(array $countries): void
    {
        Log::debug('Skeleton - SkeletonSmsGateway: getCurrentPrices Start');

    }

}
