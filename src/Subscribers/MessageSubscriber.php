<?php

namespace VendorName\Skeleton\Subscribers;

use Illuminate\Events\Dispatcher;
use Illuminate\Support\Facades\Log;
use VendorName\Skeleton\SkeletonSmsGateway;
use LowerRockLabs\LaravelSMSManager\Events\SentSMSEvent;
use LowerRockLabs\LaravelSMSManager\Events\SMSDeliveryFailureEvent;

class MessageSubscriber
{
    /**
     * Handle SMS Send events.
     */
    public function handleSMSSent($event): void
    {
        Log::debug('Skeleton: handleSMSSent Event Fired ');

        if ($event->providerName == 'Skeleton') {
            Log::debug('Skeleton: SMS Message Sent By Event');

            $messageID = $event->messageID ?? $event->smsMessage->id;
            $smsGateway = new SkeletonSmsGateway();
            $smsGateway->sendSMS(smsTo: $event->phoneNumber, message: $event->messageBody, messageID: $messageID);
        } else {
            Log::debug('Skeleton: SMS Message Not Sent - Not This Provider');

        }

    }

    /**
     * Handle SMS Failure events.
     */
    public function handleSMSFailure($event): void
    {
        Log::debug('Skeleton: handleSMSFailure Event Fired ');
        if ($event->providerName != 'Skeleton') {
            Log::debug('Skeleton: Need to Fire');
            $messageID = $event->messageID ?? $event->smsMessage->id;
            $messageBody = $event->messageBody ?? (config('lrlSMSManager.encryptSMSBody')) ? Crypt::encryptString($event->smsMessage->message_body) : $event->smsMessage->message_body;
            $phoneNumber = $event->phoneNumber ?? $event->smsMessage->destination_phone_number;
            $smsGateway = new SkeletonSmsGateway();

            $smsGateway->sendSMS(smsTo: $phoneNumber, message: $messageBody, messageID: $messageID);

        } else {
            Log::debug('Skeleton: Do Not Need to Fire');
        }
    }
    
    /**
     * Register the listeners for the subscriber.
     *
     * @return array<string, string>
     */
    public function subscribe(Dispatcher $events): array
    {
        return [
            SentSMSEvent::class => 'handleSMSSent',
            SMSDeliveryFailureEvent::class => 'handleSMSFailure',
        ];
    }
}
