<?php

use Interview\Challenge3\App\StateRequest;
use Interview\Challenge3\App\StateValidation;
use Interview\Challenge3\App\StateValidationInterface;
use Interview\Challenge3\Vendor\StateRequestFactoryInterface;
use Interview\Misc\IoC;

/*
 * In our app, we installed vendor package which unfortunately has one hardcoded dependency.
 * Client asked to allow changing state of the address only to allowed list of state, but we cannot do it easily
 * because Vendor/Controller creates new CustomerAddress service instance instead of getting it from a constructor.
 *
 * As we cannot touch code from vendor folder, you have to replace one interface using dependency container.
 * In your implementation of that interface, you have to use AvailableStateRepositoryInterface.
 *
 * That interface, is implemented in phpunit test, so you don't need to implement it on your own and just use it to get
 * a list of available states. Otherwise, you have to throw \DomainException.
 */


IoC::set(StateRequestFactoryInterface::class, StateRequest::class);
IoC::set(StateValidationInterface::class, StateValidation::class);
