<?php

namespace Product\Shared;

use Core\Shared\Collection;
use Product\Domain\Entity\ProductEntity;

class ProductCollection extends Collection
{
    protected string $allowedType = ProductEntity::class;

    public function toArray(): array
    {
        return array_map(fn(ProductEntity $item) => $item->toArray(), $this->items);
    }
}
