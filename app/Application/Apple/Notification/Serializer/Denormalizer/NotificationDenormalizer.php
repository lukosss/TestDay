<?php

namespace App\Application\Apple\Notification\Serializer\Denormalizer;

use App\Domain\Notification\Dto\AppleNotification;
use Symfony\Component\Serializer\Exception\BadMethodCallException;
use Symfony\Component\Serializer\Exception\ExceptionInterface;
use Symfony\Component\Serializer\Exception\ExtraAttributesException;
use Symfony\Component\Serializer\Exception\InvalidArgumentException;
use Symfony\Component\Serializer\Exception\LogicException;
use Symfony\Component\Serializer\Exception\RuntimeException;
use Symfony\Component\Serializer\Exception\UnexpectedValueException;
use Symfony\Component\Serializer\Normalizer\DenormalizerInterface;

class NotificationDenormalizer implements DenormalizerInterface
{

    public function denormalize($data, string $type, string $format = null, array $context = []): AppleNotification
    {
        return new AppleNotification(
            $data['result']['auto_renew_adam_id'],
            $data['result']['notification_type'],
        );
    }

    public function supportsDenormalization($data, string $type, string $format = null): bool
    {
        return $type === AppleNotification::class;
    }
}
