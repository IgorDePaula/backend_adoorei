<?php

use Product\Application\Dto\ProductDto;

it('should get product dto instance from array', function () {
    $data = [
        'name' => 'teste',
        'description' => 'teste teste',
        'price' => 10.9,
        'quantity' => 20,
    ];
    $dto = ProductDto::fromArray($data);
    expect($dto)->toBeInstanceOf(ProductDto::class);
});

it('should get product dto to array', function () {

    $dto = new ProductDto(
        'teste',
        'teste teste',
        10.9,
        20
    );

    expect($dto->toArray())->toBeArray();
});
