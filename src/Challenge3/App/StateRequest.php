<?php

namespace Interview\Challenge3\App;

use Interview\Challenge3\Vendor\StateRequestFactoryInterface;
use Interview\Challenge3\Vendor\StateRequestInterface;
use Interview\Misc\IoC;

class StateRequest implements StateRequestInterface, StateRequestFactoryInterface
{
    public const ADDRESS_ID_KEY = 'address_id';
    public const STATE_KEY      = 'state';

    private string $addressId;

    private string $state;

    public function __construct(private readonly AvailableStateRepositoryInterface $availableStateRepository)
    {}

    public function createFromGET(): StateRequestInterface
    {
        $request = new static($this->availableStateRepository);

        $request->addressId = (string)($_GET[self::ADDRESS_ID_KEY] ?? '');
        $request->state     = (string)($_GET[self::STATE_KEY] ?? '');

        if(!in_array($request->state, $this->availableStateRepository->all())) {
            throw new \DomainException;
        }
        return $request;
    }


    public function getAddressId(): string
    {
        return $this->addressId;
    }

    public function getState(): string
    {
        return $this->state;
    }
}