<?php

namespace App\Domain\Notification\Service;


use App\Domain\Notification\Dto\Notification;
use App\Domain\Notification\Interface\NotificationServiceInterface;
use App\Events\AppleNotificationReceived;
use Illuminate\Http\Request;

class AppleNotificationService implements NotificationServiceInterface
{

    private Request $request;

    public function __construct(Request $request)
    {
        $this->request = $request;
    }

    public function execute()
    {
        //get the body from apple notification service
        $notification = $this->getPaymentInfo();
        AppleNotificationReceived::dispatch($notification);
    }

    private function getPaymentInfo(): Notification
    {
//        denormalizer logic;
//        returns Notification Dto;
//        return $this->denormalizer->denormalize();
        return new Notification();
    }
}
