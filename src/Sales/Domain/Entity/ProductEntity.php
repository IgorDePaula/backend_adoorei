<?php

namespace Sales\Domain\Entity;

use Core\Domain\EntityInterface;
use Core\Shared\ArrayableInterface;

// @codeCoverageIgnoreStart
class ProductEntity implements EntityInterface, ArrayableInterface
{
    public function __construct(
        private ?int    $id = null,
        private ?string $name = null,
        private ?string $description = null,
        private ?float  $price = null,
        private ?int    $quantity = null,
    )
    {

    }

    public function getName(): ?string
    {
        return $this->name;
    }

    public function getDescription(): ?string
    {
        return $this->description;
    }

    public function getPrice(): ?float
    {
        return $this->price;
    }

    public function getQuantity(): ?int
    {
        return $this->quantity;
    }

    public function toArray(): array
    {
        return [
            'id' => $this->id,
            'name' => $this->name,
            'description' => $this->description,
            'price' => $this->price,
            'quantity' => $this->quantity,
        ];
    }

    public function getId()
    {
        return $this->id;
    }
}
// @codeCoverageIgnoreEnd
