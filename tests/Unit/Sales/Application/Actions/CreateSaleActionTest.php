<?php

use Core\Shared\Result;
use Sales\Application\Actions\CreateSale;
use Sales\Domain\Entity\SaleEntity;
use Sales\Infrastructure\Repository\SaleRepository;
use Sales\Shared\ProductCollection;

it('should create Sale action', function () {

    $repositoryMock = Mockery::mock(SaleRepository::class)
        ->shouldReceive('create')
        ->andReturn(new SaleEntity(1, 0, new ProductCollection()))
        ->getMock();

    $list = new CreateSale($repositoryMock);

    $response = $list(null);
    expect($response)->toBeInstanceOf(Result::class)
        ->and($response->isSuccess())->toBeTrue();
});
