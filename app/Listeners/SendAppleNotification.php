<?php

namespace App\Listeners;

use App\Events\AppleNotificationReceived;
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
        switch ($event->notification->getPaymentType()) {
            case 'DID_RENEW':
                //turi perduoti ir adam_id ir user_id
                DidRenew::dispatch($event->notification);
                break;
            case 'INITIAL_BUY':
                InitialBuy::dispatch($event->notification);
                break;
            case 'DID_FAIL_TO_RENEW':
                DidRenew::dispatch($event->notification);
                break;
            case 'CANCEL':
                DidRenew::dispatch($event->notification);
                break;
        }
    }
}
