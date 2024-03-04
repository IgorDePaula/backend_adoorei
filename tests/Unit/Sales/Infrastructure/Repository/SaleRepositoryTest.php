<?php

use App\Models\Sale;
use Sales\Domain\Director\SaleDirector;
use Sales\Domain\Entity\ProductEntity;
use Sales\Infrastructure\Repository\SaleRepository;

it('should list sale by repository', function ($id, $amount, $products) {

    $modelMock = Mockery::mock(Sale::class)
        ->shouldReceive('all')
        ->andReturn(
            [new ProductEntity($id, $amount, $products)]
        )->getMock();

    $director = new SaleDirector();

    $repository = new SaleRepository($modelMock, $director);

    expect($repository->list()->isEmpty())->toBeFalse();
    expect($repository->list())->toHaveCount(1);

})->with('products');
