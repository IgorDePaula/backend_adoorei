<?php

use Product\Application\Dto\ProductDto;
use Product\Shared\ProductMapper;

it('should get product mapper', function () {

    $data = [
        'name' => 'teste',
        'description' => 'teste teste',
        'price' => 10.9,
        'quantity' => 20,
    ];

    $mapper = new ProductMapper();

    expect($mapper->toDto($data, ProductDto::class))->toBeInstanceOf(ProductDto::class);
});
