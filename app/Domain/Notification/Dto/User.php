<?php


namespace App\Domain\Notification\Dto;


class User
{
    private $user_id;

    public function __construct(int $user_id)
    {
        $this->user_id = $user_id;
    }


    public function getUserId(): int
    {
        return $this->user_id;
    }

}
