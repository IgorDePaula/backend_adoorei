<?php

namespace Sales\Shared;

use Core\Shared\Collection;
use Sales\Domain\Entity\ProductEntity;

class ProductCollection extends Collection
{
    protected string $allowedType = ProductEntity::class;

    public function toArray(): array
    {
        return array_map(fn(ProductEntity $item) => $item->toArray(), $this->items);
    }

    public function sum()
    {
        return array_sum(
            array_map(fn(ProductEntity $item) => $item->getPrice() * $item->getQuantity(), $this->items)
        );
    }
}
