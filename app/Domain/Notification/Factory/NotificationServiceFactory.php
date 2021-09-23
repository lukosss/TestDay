<?php

namespace App\Domain\Notification\Factory;


use App\Domain\Notification\Interface\NotificationServiceInterface;
use App\Domain\Notification\Service\AppleNotificationService;
use Illuminate\Http\Request;

class NotificationServiceFactory
{

    /**
     * @var AppleNotificationService
     */
    private AppleNotificationService $appleNotificationService;

    public function __construct(AppleNotificationService $appleNotificationService)
    {
        $this->appleNotificationService = $appleNotificationService;
    }

    public function build(string $provider): NotificationServiceInterface
    {
        switch ($provider) {
            case 'apple':
                return $this->appleNotificationService;
            case 'android':
                // return $this->androidNotificationService;
                break;

            default:
                throw new \LogicException('No such provider');
        }
    }
}
