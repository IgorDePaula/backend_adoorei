<?php

namespace Product\Application\Dto;

use Core\Application\AbstractDto;

class ProductDto extends AbstractDto
{
    public function __construct(
        public readonly string $name,
        public readonly string $description,
        public readonly float  $price,
        public readonly int    $quantity,
    )
    {

    }

    static public function fromArray(array $data): static
    {
        return new static(
            name: $data['name'],
            description: $data['description'],
            price: $data['price'],
            quantity: $data['quantity'],
        );
    }

    public function toArray(): array
    {
        return [
            'name' => $this->name,
            'description' => $this->description,
            'price' => $this->price,
            'quantity' => $this->quantity,
        ];
    }
}
