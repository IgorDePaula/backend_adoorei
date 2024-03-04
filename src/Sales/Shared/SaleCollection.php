<?php

namespace Sales\Shared;

use Core\Shared\Collection;
use Sales\Domain\Entity\SaleEntity;

class SaleCollection extends Collection
{
    protected string $allowedType = SaleEntity::class;

    public function toArray(): array
    {
        return array_map(fn(SaleEntity $item) => $item->toArray(), $this->items);
    }

    public function sum()
    {
        return array_sum(
            array_map(fn(SaleEntity $item) => $item->getPrice() * $item->getQuantity(), $this->items)
        );
    }
}
