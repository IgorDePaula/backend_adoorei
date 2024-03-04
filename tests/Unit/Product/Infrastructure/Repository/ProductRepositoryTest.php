<?php

use App\Models\Product;
use Product\Domain\Director\ProductDirector;
use Product\Domain\Entity\ProductEntity;
use Product\Infrastructure\Repository\ProductRepository;

it('should list product by repository', function ($id, $name, $description, $price, $quantity) {

    $modelMock = Mockery::mock(Product::class)
        ->shouldReceive('all')
        ->andReturn(
            [new ProductEntity($id, $name, $description, $price, $quantity)]
        )->getMock();

    $director = new ProductDirector();

    $repository = new ProductRepository($modelMock, $director);

    expect($repository->list()->isEmpty())->toBeFalse();
    expect($repository->list())->toHaveCount(1);

})->with('products');
