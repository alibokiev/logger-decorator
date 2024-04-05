<?php

namespace App\Event;

use Symfony\Contracts\EventDispatcher\Event;

class LoggerEvent extends Event
{
    public const NAME = 'logger.event';

    public function __construct(
        public string $message
    )
    {
    }

    public function getMessage(): string
    {
        return $this->message;
    }

    public function setMessage(string $message): void
    {
        $this->message = $message;
    }
}