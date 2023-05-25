<?php

namespace VendorName\Skeleton\Subscribers;

use Illuminate\Events\Dispatcher;
use Illuminate\Support\Facades\Log;
use VendorName\Skeleton\SkeletonSmsGateway;
use LowerRockLabs\LaravelSMSManager\Events\SentSMSEvent;

class MessageSubscriber
{
    /**
     * Handle user login events.
     */
    public function handleSMSSent($event): void
    {
        Log::debug('Skeleton: SMS Message Sent By Event');

        $messageID = $event->messageID ?? $event->smsMessage->id;
        $smsGateway = new SkeletonSmsGateway();
        $smsGateway->sendSMS(smsTo: $event->phoneNumber, message: $event->messageBody, messageID: $messageID);

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
        ];
    }
}
