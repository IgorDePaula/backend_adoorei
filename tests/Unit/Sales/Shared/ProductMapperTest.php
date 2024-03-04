<?php

use Sales\Application\Dto\SaleDto;
use Sales\Domain\Entity\ProductEntity;
use Sales\Domain\Entity\SaleEntity;
use Sales\Shared\ProductCollection;
use Sales\Shared\ProductMapper;

it('should get sale mapper to dto', function ($id, $amount, $products) {

    $mapper = new ProductMapper();

    $group = array_map(fn($item) => new ProductEntity(...$item), $products);

    $data = [
        'id' => $id,
        'amount' => $amount,
        'products' => new ProductCollection($group),
    ];

    expect($mapper->toDto($data, SaleDto::class))->toBeInstanceOf(SaleDto::class);

})->with('sales');


it('should get sale mapper to persistence', function ($id, $amount, $products) {


    $mapper = new ProductMapper();

    $group = array_map(fn($item) => new ProductEntity(...$item), $products);

    $data = [
        'id' => $id,
        'amount' => $amount,
        'products' => new ProductCollection($group),
    ];

    expect($mapper->toPersistence(SaleDto::fromArray($data)))->toBeArray();
})->with('sales');

it('should get sale mapper to domain', function ($id, $amount, $products) {


    $mapper = new ProductMapper();

    $group = array_map(fn($item) => new ProductEntity(...$item), $products);

    $data = [
        'id' => $id,
        'amount' => $amount,
        'products' => new ProductCollection($group),
    ];

    expect($mapper->toDomain($data))->toBeInstanceOf(SaleEntity::class);
})->with('sales');
