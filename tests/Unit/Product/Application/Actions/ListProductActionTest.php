<?php

use Product\Application\Actions\ListProduct;
use Product\Domain\Entity\ProductEntity;
use Product\Infrastructure\Repository\ProductRepository;
use Product\Shared\ProductCollection;

it('should list product', function ($id, $name, $description, $price, $quantity) {
    $repositoryMock = Mockery::mock(ProductRepository::class)
        ->shouldReceive('list')
        ->andReturn(ProductCollection::make([new ProductEntity($id, $name, $description, $price, $quantity)]))
        ->getMock();

    $list = new ListProduct($repositoryMock);

    $response = $list(null);
    expect($response)->toBeInstanceOf(\Core\Shared\Result::class)
        ->and($response->isSuccess())->toBeTrue();

})->with('products');
