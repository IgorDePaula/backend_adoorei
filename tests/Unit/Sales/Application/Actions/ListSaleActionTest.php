<?php

use Sales\Application\Actions\ListSale;
use Sales\Domain\Entity\SaleEntity;
use Sales\Infrastructure\Repository\SaleRepository;
use Sales\Shared\SaleCollection;

it('should list Sale', function ($id, $amount, $products) {
    $group = array_map(fn($item) => new \Sales\Domain\Entity\ProductEntity(...$item), $products);
    $repositoryMock = Mockery::mock(SaleRepository::class)
        ->shouldReceive('list')
        ->andReturn(SaleCollection::make([new SaleEntity($id, $amount, new \Sales\Shared\ProductCollection($group))]))
        ->getMock();

    $list = new ListSale($repositoryMock);

    $response = $list(null);
    expect($response)->toBeInstanceOf(\Core\Shared\Result::class)
        ->and($response->isSuccess())->toBeTrue();

})->with('sales')->skip();
