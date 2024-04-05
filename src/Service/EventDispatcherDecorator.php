<?php

namespace App\Service;

class EventDispatcherDecorator
{
    public function __construct(
        public $obj,
        public $logger
    )
    {
    }

    public function __get($name)
    {
        return $this->obj->$name;
    }

    public function __set($name, $value)
    {
        return $this->obj->$name = $value;
    }

    public function __call($name, $args)
    {
        if ($name == 'dispatch') {
            $this->logger->info('Event run with: ' . $args[0]->getMessage());
        }

        return call_user_func_array([$this->obj, $name], $args);
    }
}