<?php

use Sales\Domain\Entity\ProductEntity;

it('should get product entity', function ($id, $name, $description, $price, $quantity) {

    $productEntity = new ProductEntity($id, $name, $description, $price, $quantity);

    expect($productEntity->getId())->toBe($id)
        ->and($productEntity->getName())->toBe($name)
        ->and($productEntity->getDescription())->toBe($description)
        ->and($productEntity->getPrice())->toBe($price)
        ->and($productEntity->getQuantity())->toBe($quantity)
        ->and($productEntity->toArray())->toBeArray();
})->with('products');
