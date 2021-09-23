<?php

namespace App\Domain\Notification\Service;


use App\Application\Apple\Notification\Serializer\Denormalizer\NotificationDenormalizer;
use App\Domain\Notification\Dto\AppleNotification;
use App\Domain\Notification\Interface\NotificationServiceInterface;
use App\Events\AppleNotificationReceived;
use Illuminate\Http\Request;

class AppleNotificationService implements NotificationServiceInterface
{

    private NotificationDenormalizer $denormalizer;
    private UserResolverService $userResolverService;

    public function __construct(NotificationDenormalizer $denormalizer, UserResolverService $userResolverService)
    {
        $this->denormalizer = $denormalizer;
        $this->userResolverService = $userResolverService;
    }

    public function execute(array $notification): void
    {
        $object = $this->buildAppleNotification($notification);
        $user = $this->userResolverService->getApplePaymentUser($notification);
        AppleNotificationReceived::dispatch($object, $user);
    }

    private function buildAppleNotification(array $notification): AppleNotification
    {
        return $this->denormalizer->denormalize(
            $notification,
            AppleNotification::class
        );
    }
}
