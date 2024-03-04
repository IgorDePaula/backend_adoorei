<?php

namespace Sales\Shared;

use Core\Application\AbstractDto;
use Core\Domain\EntityInterface;
use Core\Shared\MapperInterface;
use Sales\Application\Dto\SaleDto;
use Sales\Domain\Entity\SaleEntity;


class ProductMapper implements MapperInterface
{

    public function toDto(mixed $data, ?string $convertTo = null): AbstractDto
    {
        return match ($convertTo) {
            SaleDto::class => SaleDto::fromArray($data),
        };
    }

    public function toPersistence(AbstractDto $data): array
    {
        return $data->toArray();
    }

    public function toDomain(array $data): EntityInterface|AbstractDto
    {
        return new SaleEntity(...$data);
    }
}
