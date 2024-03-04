<?php

use App\Models\Sale;
use Sales\Domain\Director\SaleDirector;
use Sales\Domain\Entity\ProductEntity;
use Sales\Domain\Entity\SaleEntity;
use Sales\Infrastructure\Repository\SaleRepository;
use Sales\Shared\ProductCollection;

it('should list sale by repository', function ($id, $amount, $products) {

    $group = array_map(fn($item) => new ProductEntity(...$item), $products);
    $modelMock = Mockery::mock(Sale::class)
        ->shouldReceive('all')
        ->andReturn(
            [new SaleEntity($id, $amount, new ProductCollection($group))]
        )->getMock();

    $director = new SaleDirector();

    $repository = new SaleRepository($modelMock, $director);

    expect($repository->list()->isEmpty())->toBeFalse();
    expect($repository->list())->toHaveCount(1);

})->with('sales');


it('should create sale by repository', function () {

    $modelMock = Mockery::mock(Sale::class)
        ->shouldReceive('create')
        ->andReturn(
            new SaleEntity(1, 0, new ProductCollection())
        )->getMock();

    $director = new SaleDirector();

    $repository = new SaleRepository($modelMock, $director);

    expect($repository->create()->getId())->not->toBeNull();
});
