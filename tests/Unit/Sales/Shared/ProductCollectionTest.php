<?php

use Sales\Domain\Entity\ProductEntity;
use Sales\Shared\ProductCollection;

it('should get product collection sum', function () {
    $collection = new ProductCollection();
    $collection->add(new ProductEntity(1, 'teste', 'testes', 10.9, 2));
    $collection->add(new ProductEntity(2, 'asd', 'asd', 15.3, 3));

    expect($collection->sum())->toBe(67.7);
});
