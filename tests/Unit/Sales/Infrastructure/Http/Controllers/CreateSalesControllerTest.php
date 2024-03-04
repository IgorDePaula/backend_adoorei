<?php

use Core\Application\ActionFactory;
use Core\Shared\Result;
use Sales\Application\Dto\CreateSaleDto;
use Sales\Domain\Entity\SaleEntity;
use Sales\Infrastructure\Http\Controllers\CreateSaleController;
use Sales\Infrastructure\Http\Request\CreateSalesRequest;
use Sales\Shared\ProductCollection;

it('should return a 201 with an element', function () {


    $dtoMock = Mockery::mock(CreateSaleDto::class);
    $requestMock = Mockery::mock(CreateSalesRequest::class);
    $requestMock->shouldReceive('toDto')->once()->andReturn($dtoMock);
    $saleEntity = new SaleEntity(1, 0, new ProductCollection());
    $factoryMock = Mockery::mock(ActionFactory::class)
        ->shouldReceive('makeAction')->andReturn(Result::success($saleEntity))->getMock();

    $controller = new CreateSaleController($factoryMock);

    $result = $controller($requestMock);

    expect($result->getStatusCode())->toBe(201);
});
