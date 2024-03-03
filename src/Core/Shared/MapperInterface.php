<?php

namespace Core\Shared;

use Core\Application\AbstractDto;
use Core\Domain\EntityInterface;

interface MapperInterface
{
    public function toDto($data, ?string $convertTo = null): AbstractDto;

    public function toPersistence(AbstractDto $data): array;

    public function toDomain(array $data): AbstractDto|EntityInterface;
}
