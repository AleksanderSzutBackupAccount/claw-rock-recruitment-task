<?php

namespace Interview\Challenge3\App;

use Interview\Challenge3\Vendor\StateRequestInterface;
use Interview\Challenge3\Vendor\StateRequest as StateRequestOverwritten;
use Interview\Misc\IoC;

final class StateRequest extends StateRequestOverwritten
{
    public function createFromGET(): StateRequestInterface
    {
        $request = parent::createFromGET();

        IoC::get(StateValidationInterface::class)
            ->validate($request->getState());

        return $request;
    }
}