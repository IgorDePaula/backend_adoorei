<?php

namespace Sales\Infrastructure\Repository\Interfaces;

use Core\Domain\EntityInterface;

interface SaleRepositoryInterface
{
    public function create(): EntityInterface;
}
