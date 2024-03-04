<?php

namespace Sales\Domain\Entity;

use Core\Domain\EntityInterface;
use Core\Shared\ArrayableInterface;
use Sales\Shared\ProductCollection;

// @codeCoverageIgnoreStart
class SaleEntity implements EntityInterface, ArrayableInterface
{
    public function __construct(
        private ?int               $id = null,
        private ?float             $amount = null,
        private ?ProductCollection $products = null
    )
    {

    }

    public function toArray(): array
    {
        return [
            'id' => $this->getId(),
            'amount' => $this->getAmount(),
            'products' => $this->getProducts()->toArray()
        ];
    }

    public function getId()
    {
        return $this->id;
    }

    public function getAmount(): ?float
    {
        return $this->amount;
    }

    public function getProducts(): ?ProductCollection
    {
        return $this->products;
    }
}
// @codeCoverageIgnoreEnd
