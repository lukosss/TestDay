<?php

namespace App\Listeners;

use App\Events\InitialBuy;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Queue\InteractsWithQueue;

class CreateSubscriptionListener
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
     * @param  InitialBuy  $event
     * @return void
     */
    public function handle(InitialBuy $event)
    {
        //
    }
}
