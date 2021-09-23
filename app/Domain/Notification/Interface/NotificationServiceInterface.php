<?php


namespace App\Domain\Notification\Interface;


interface NotificationServiceInterface
{
    public function execute(array $notification);
}
