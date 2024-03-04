<?php

namespace Sales\Domain\Builder;

use Core\Domain\BuilderInterface;
use Core\Domain\EntityInterface;
use Core\Shared\Collection;
use Sales\Domain\Entity\SaleEntity;
use Sales\Shared\ProductCollection;

class SaleBuilder implements BuilderInterface
{
    private $id, $amount, $products;

    public function withId(int $id): BuilderInterface
    {
        $this->id = $id;
        return $this;
    }

    public function withAmount(float $amount): BuilderInterface
    {
        $this->amount = $amount;
        return $this;
    }

    public function withProducts(ProductCollection $products): BuilderInterface
    {
        $this->products = $products;
        return $this;
    }

    public function build(): EntityInterface|Collection
    {
        return new SaleEntity(id: $this->id, amount: $this->amount, products: $this->products);
    }
}
