<?php

namespace Interview\Challenge3\App;

use function Symfony\Component\Translation\t;

final readonly class StateValidation implements StateValidationInterface
{
    private const ERROR_MESSAGE = 'State is not available';

    public function __construct(
        private AvailableStateRepositoryInterface $availableStateRepository) {
    }

    public function validate(string $value): bool
    {
        if (!in_array($value, $this->availableStateRepository->all(), true)) {
            throw new \DomainException(self::ERROR_MESSAGE);
        }

        return true;
    }
}