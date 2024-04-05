<?php

namespace App\EventSubscriber;

use App\Event\LoggerEvent;
use Symfony\Component\EventDispatcher\EventSubscriberInterface;

class LoggerEventSubscriber implements EventSubscriberInterface
{
    public static function getSubscribedEvents(): array
    {
        return [
            LoggerEvent::NAME => 'handler'
        ];
    }

    public function handler(LoggerEvent $event)
    {
        //
    }
}