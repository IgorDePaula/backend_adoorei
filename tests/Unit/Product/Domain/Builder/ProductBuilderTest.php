<?php

use Product\Domain\Builder\ProductBuilder;
use Product\Domain\Entity\ProductEntity;

it('should build a product entity', function ($id, $name, $description, $price, $quantity) {

    $productBuilder = new ProductBuilder();
    $build = $productBuilder->withId($id)
        ->withName($name)
        ->withDescription($description)
        ->withPrice($price)
        ->withQuantity($quantity)
        ->build();
    expect($build)->toBeInstanceOf(ProductEntity::class);

})->with('products');
