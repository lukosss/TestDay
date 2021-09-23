<?php


namespace App\Domain\Notification\Dto;


class Notification
{

    private $adam_id;
    private $payment_type;

    public function __construct(string $adam_id, string $payment_type)
    {
        $this->adam_id = $adam_id;
        $this->payment_type = $payment_type;
    }


    public function getAdamId(): string
    {
        return $this->adam_id;
    }

    public function getPaymentType(): string
    {
        return $this->payment_type;
    }

}
