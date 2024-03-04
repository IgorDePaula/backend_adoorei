<?php

use Product\Domain\Director\ProductDirector;
use Product\Domain\Entity\ProductEntity;

it('sloud direct a product', function ($id, $name, $description, $price, $quantity) {

    $director = new ProductDirector();
    $build = $director->make([
        'id' => $id,
        'name' => $name,
        'description' => $description,
        'price' => $price,
        'quantity' => $quantity,
    ]);

    expect($build)->toBeInstanceOf(ProductEntity::class);

})->with('products');
