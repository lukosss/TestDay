<?php

namespace App\Providers;

use App\Events\AppleNotificationReceived;
use App\Events\Cancel;
use App\Events\DidFailToRenew;
use App\Events\DidRenew;
use App\Listeners\CancelSubscriptionListener;
use App\Listeners\RenewSubscriptionListener;
use App\Listeners\SendAppleNotification;
use Illuminate\Auth\Events\Registered;
use Illuminate\Auth\Listeners\SendEmailVerificationNotification;
use Illuminate\Foundation\Support\Providers\EventServiceProvider as ServiceProvider;
use Illuminate\Support\Facades\Event;

class EventServiceProvider extends ServiceProvider
{
    /**
     * The event listener mappings for the application.
     *
     * @var array
     */
    protected $listen = [
        Registered::class => [
            SendEmailVerificationNotification::class,
        ],
        AppleNotificationReceived::class => [
            SendAppleNotification::class,
        ],
        DidRenew::class => [
            RenewSubscriptionListener::class,
        ],
        DidFailToRenew::class => [
            CancelSubscriptionListener::class,
        ],
        Cancel::class => [
            CancelSubscriptionListener::class,
        ],
    ];

    /**
     * Register any events for your application.
     *
     * @return void
     */
    public function boot()
    {
        //
    }
}
