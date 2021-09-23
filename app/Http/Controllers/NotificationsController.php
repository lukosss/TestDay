<?php

namespace App\Http\Controllers;

use App\Domain\Notification\Factory\NotificationServiceFactory;
use App\Domain\Notification\Interface\NotificationServiceInterface;
use App\Models\User;
use Illuminate\Http\Request;

class NotificationsController extends Controller
{

    private NotificationServiceFactory $factory;

    public function __construct(NotificationServiceFactory $factory)
    {
        $this->factory = $factory;
    }

    public function store(string $provider, Request $request): NotificationServiceInterface
    {
//        TODO: might implement deserializer here
        $notification = $request->json();

        return $this->factory->build($provider)->execute($notification);
    }
}
