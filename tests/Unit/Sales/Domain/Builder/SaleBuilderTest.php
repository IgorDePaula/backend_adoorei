<?php

use Sales\Domain\Builder\SaleBuilder;
use Sales\Domain\Entity\ProductEntity;
use Sales\Domain\Entity\SaleEntity;
use Sales\Shared\ProductCollection;

it('should build a sale entity', function ($id, $amount, $products) {

    $group = array_map(fn($item) => new ProductEntity(...$item), $products);
    $productBuilder = new SaleBuilder();
    $build = $productBuilder->withId($id)
        ->withAmount($amount)
        ->withProducts(new ProductCollection($group))
        ->build();
    expect($build)->toBeInstanceOf(SaleEntity::class);

})->with('sales');
