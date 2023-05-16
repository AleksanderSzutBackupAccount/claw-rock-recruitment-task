<?php

namespace Interview\Challenge2;

use Symfony\Component\EventDispatcher\EventDispatcher;

/*
 * Implement interface methods and proxy them to Symfony event dispatcher
 */

class SymfonyEventDispatcher implements EventDispatcherInterface
{
    private EventDispatcher $dispatcher;

    public function dispatch(object $event)
    {
        $this->dispatcher->dispatch($event);
    }

    public function addListener(string $event, \Closure $listener)
    {
        $this->dispatcher = new EventDispatcher();
        $this->dispatcher->addListener($event, $listener);
    }
}