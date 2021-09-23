<?php

namespace App\Events;

use App\Domain\Notification\Dto\AppleNotification;
use App\Domain\Notification\Dto\User;
use Illuminate\Broadcasting\Channel;
use Illuminate\Broadcasting\InteractsWithSockets;
use Illuminate\Broadcasting\PresenceChannel;
use Illuminate\Broadcasting\PrivateChannel;
use Illuminate\Contracts\Broadcasting\ShouldBroadcast;
use Illuminate\Foundation\Events\Dispatchable;
use Illuminate\Queue\SerializesModels;

class AppleNotificationReceived
{
    use Dispatchable, InteractsWithSockets, SerializesModels;


    private AppleNotification $notification;
    private User $user;


    public function __construct(AppleNotification $notification, User $user)
    {
        $this->notification = $notification;
        $this->user = $user;
    }

    /**
     * @return AppleNotification
     */
    public function getNotification(): AppleNotification
    {
        return $this->notification;
    }

    /**
     * @return User
     */
    public function getUser(): User
    {
        return $this->user;
    }

    /**
     * Get the channels the event should broadcast on.
     *
     * @return \Illuminate\Broadcasting\Channel|array
     */
    public function broadcastOn()
    {
        return new PrivateChannel('channel-name');
    }
}
