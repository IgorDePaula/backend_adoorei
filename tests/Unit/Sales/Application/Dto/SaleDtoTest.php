<?php

use Sales\Application\Dto\SaleDto;
use Sales\Domain\Entity\ProductEntity;
use Sales\Shared\ProductCollection;

it('should get sale dto instance from array', function ($id, $amount, $products) {

    $entities = array_map(fn($item) => new ProductEntity(...$item), $products);
    $dto = SaleDto::fromArray(['id' => $id, 'amount' => $amount, 'products' => new ProductCollection($entities)]);
    expect($dto)->toBeInstanceOf(SaleDto::class);

})->with('sales');

it('should get sale dto to array', function ($id, $amount, $products) {

    $entities = array_map(fn($item) => new ProductEntity(...$item), $products);
    $dto = SaleDto::fromArray(['id' => $id, 'amount' => $amount, 'products' => new ProductCollection($entities)]);

    expect($dto->toArray())->toBeArray()
        ->and($dto->toArray()['amount'])->toBe($amount);
})->with('sales');
