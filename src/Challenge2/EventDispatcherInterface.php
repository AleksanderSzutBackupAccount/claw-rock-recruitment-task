<?php

namespace Interview\Challenge2;

interface EventDispatcherInterface
{
    public function dispatch(object|string $event):void;

    /**
     * @param  object|string  $event
     * @var \Closure $listener (which accepts event as first argument)
     */
    public function addListener(object|string $event, \Closure $listener):void;
}