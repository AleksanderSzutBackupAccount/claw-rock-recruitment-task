<?php

namespace Interview\Challenge2;

use Illuminate\Events\Dispatcher;

/*
 * Implement interface methods and proxy them to Laravel event dispatcher
 */

class LaravelEventDispatcher implements EventDispatcherInterface
{
    private Dispatcher $dispatcher;


    public function dispatch(object|string $event): void
    {
        $this->dispatcher->dispatch($event);
    }

    public function addListener(string|object $event, \Closure $listener): void
    {
        $this->dispatcher = new Dispatcher();
        $this->dispatcher->listen($event, $listener);
    }
}