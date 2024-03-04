<?php

use Core\Application\ActionFactory;
use Core\Infrastructure\Errors\InfrastructureError;
use Core\Shared\Result;
use Sales\Application\Dto\ListSaleDto;
use Sales\Infrastructure\Http\Controllers\ListSaleController;
use Sales\Infrastructure\Http\Request\ListSalesRequest;
use Sales\Shared\ProductCollection;

describe('ListAmbit Controller', function () {
    it('should return a 200 with an element', function () {

        $data = [
            'id' => 1,
            'name' => 'test',
            'email' => 'XXXXXXXXXXXXX',
        ];

        $dtoMock = Mockery::mock(ListSaleDto::class);
        $requestMock = Mockery::mock(ListSalesRequest::class);
        $requestMock->shouldReceive('toDto')->once()->andReturn($dtoMock);

        $collectionMock = Mockery::mock(ProductCollection::make());
        $collectionMock->shouldReceive('toArray')->once()->andReturn([$data]);


        $factoryMock = Mockery::mock(ActionFactory::class)
            ->shouldReceive('makeAction')->andReturn(Result::success($collectionMock))->getMock();

        $controller = new ListSaleController($factoryMock);

        $result = $controller($requestMock);

        expect($result->getStatusCode())->toBe(200)
            ->and((array)$result->getData()->data[0])->toBe($data);
    });

    it('should return a 204', function () {

        $data = [
            'id' => 1,
            'name' => 'test',
            'email' => 'XXXXXXXXXXXXX',
        ];

        $dtoMock = Mockery::mock(ListSaleDto::class);
        $requestMock = Mockery::mock(ListSalesRequest::class);
        $requestMock->shouldReceive('toDto')->once()->andReturn($dtoMock);


        $factoryMock = Mockery::mock(ActionFactory::class)
            ->shouldReceive('makeAction')->andReturn(Result::fail(new InfrastructureError('no content')))->getMock();

        $controller = new ListSaleController($factoryMock);

        $result = $controller($requestMock);
        expect($result->getStatusCode())->toBe(406)
            ->and($result->getData()->data)->toBe('no content');
    });

});
