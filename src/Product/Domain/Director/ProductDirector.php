<?php

namespace Product\Domain\Director;

use Core\Domain\DirectorInterface;
use Core\Domain\EntityInterface;
use Core\Shared\Collection;
use Product\Domain\Builder\ProductBuilder;

class ProductDirector implements DirectorInterface
{
    public function make(array $data): EntityInterface|Collection
    {
        $methods = [
            'id' => 'withId',
            'name' => 'withName',
            'description' => 'withDescription',
            'price' => 'withPrice',
            'quantity' => 'withQuantity',
        ];
        $builder = new ProductBuilder();
        foreach ($methods as $key => $method) {
            if (isset($data[$key])) {
                $builder->{$method}($data[$key]);
            }
        }
        return $builder->build();
    }
}
