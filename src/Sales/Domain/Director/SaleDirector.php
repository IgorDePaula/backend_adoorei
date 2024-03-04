<?php

namespace Sales\Domain\Director;

use Core\Domain\DirectorInterface;
use Core\Domain\EntityInterface;
use Core\Shared\Collection;
use Sales\Domain\Builder\SaleBuilder;

class SaleDirector implements DirectorInterface
{
    public function make(array $data): EntityInterface|Collection
    {
        $methods = [
            'id' => 'withId',
            'amount' => 'withAmount',
            'product' => 'withProduct',
        ];
        $builder = new SaleBuilder();
        foreach ($methods as $key => $method) {
            if (isset($data[$key])) {
                $builder->{$method}($data[$key]);
            }
        }
        return $builder->build();
    }
}
