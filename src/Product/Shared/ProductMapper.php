<?php

namespace Product\Shared;

use Core\Application\AbstractDto;
use Core\Domain\EntityInterface;
use Core\Shared\MapperInterface;
use Product\Application\Dto\ProductDto;


class ProductMapper implements MapperInterface
{

    public function toDto(mixed $data, ?string $convertTo = null): AbstractDto
    {
        return match ($convertTo) {
            ProductDto::class => ProductDto::fromArray($data),
        };
    }

    /**
     * @param mixed $data
     * @return array
     */
    public function toPersistence(AbstractDto $data): array
    {
        return [];
    }

    public function toDomain(array $data): EntityInterface|AbstractDto
    {
//
    }
}
