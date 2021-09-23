<?php

namespace App\Listeners;

use App\Events\DidFailToRenew;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Queue\InteractsWithQueue;

class CancelSubscriptionListener
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
     * @param  DidFailToRenew  $event
     * @return void
     */
    public function handle(DidFailToRenew $event)
    {
        //
    }
}
