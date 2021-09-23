<?php

namespace App\Listeners;

use App\Events\DidRenew;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Queue\InteractsWithQueue;

class RenewSubscriptionListener
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
     * @param  DidRenew  $event
     * @return void
     */
    public function handle(DidRenew $event)
    {
        //
    }
}
