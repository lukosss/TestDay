<?php

namespace App\Domain\Notification\Factory;


use App\Domain\Notification\Interface\NotificationServiceInterface;
use App\Domain\Notification\Service\AppleNotificationService;
use Illuminate\Http\Request;

class NotificationServiceFactory
{

    public function build(string $provider, Request $request): NotificationServiceInterface
    {
        if ($provider === 'apple')
        //check if apple or android or stripe or etc..
        {
            return new AppleNotificationService($request);
        }
    }
}
