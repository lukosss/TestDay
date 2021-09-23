<?php

namespace App\Listeners;

use App\Events\AppleNotificationReceived;
use App\Events\Cancel;
use App\Events\DidRenew;
use App\Events\InitialBuy;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Queue\InteractsWithQueue;

class SendAppleNotification
{
    /**
     * Create the event listener.
     *
     * @return void
     */
    public function __construct()
    {
        //
    }

    /**
     * Handle the event.
     *
     * @param  AppleNotificationReceived  $event
     * @return void
     */
    public function handle(AppleNotificationReceived $event)
    {
        switch ($event->getNotification()->getPaymentType()) {
            case 'DID_RENEW':
                //turi perduoti ir adam_id ir user_id
                DidRenew::dispatch($event->getNotification(), $event->getUser());
                break;
            case 'INITIAL_BUY':
                InitialBuy::dispatch($event->getNotification());
                break;
            case 'DID_FAIL_TO_RENEW':
                DidRenew::dispatch($event->getNotification());
                break;
            case 'CANCEL':
                Cancel::dispatch($event->getNotification());
                break;
            default:
                throw new \LogicException('No such event');
        }
    }
}
