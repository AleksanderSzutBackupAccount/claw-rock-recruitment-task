<?php

namespace Interview\Challenge3\App;

interface StateValidationInterface
{
    /**
     * @throws \DomainException
     */
    public function validate(string $value): bool;
}