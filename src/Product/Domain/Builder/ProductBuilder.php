<?php

namespace Product\Domain\Builder;

use Core\Domain\BuilderInterface;
use Core\Domain\EntityInterface;
use Core\Shared\Collection;
use Product\Domain\Entity\ProductEntity;

class ProductBuilder implements BuilderInterface
{
    private $id, $name, $description, $price, $quantity;

    public function withId(int $id): BuilderInterface
    {
        $this->id = $id;
        return $this;
    }

    public function withName(string $name): BuilderInterface
    {
        $this->name = $name;
        return $this;
    }

    public function withDescription(string $description): BuilderInterface
    {
        $this->description = $description;
        return $this;
    }

    public function withPrice(string $price): BuilderInterface
    {
        $this->price = $price;
        return $this;
    }

    public function withQuantity(string $quantity): BuilderInterface
    {
        $this->quantity = $quantity;
        return $this;
    }

    public function build(): EntityInterface|Collection
    {
        return new ProductEntity(id: $this->id, name: $this->name, description: $this->description, price: $this->price, quantity: $this->quantity);
    }
}
