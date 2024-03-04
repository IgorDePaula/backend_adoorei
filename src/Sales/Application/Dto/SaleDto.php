<?php

namespace Sales\Application\Dto;

use Core\Application\AbstractDto;
use Sales\Shared\ProductCollection;

class SaleDto extends AbstractDto
{
    public function __construct(
        public readonly int               $id,
        public readonly ProductCollection $products
    )
    {

    }

    static public function fromArray(array $data): static
    {
        return new static(
            id: $data['id'],
            products: $data['products'],
        );
    }

    public function toArray(): array
    {
        return [
            'id' => $this->id,
            'products' => $this->products->toArray(),
            'amount' => $this->products->sum(),
        ];
    }
}
