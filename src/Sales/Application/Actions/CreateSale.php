<?php

namespace Sales\Application\Actions;

use Core\Application\AbstractDto;
use Core\Application\ActionInterface;
use Core\Shared\Result;
use Sales\Infrastructure\Repository\Interfaces\SaleRepositoryInterface;

class CreateSale implements ActionInterface
{
    public function __construct(private readonly SaleRepositoryInterface $repository)
    {

    }

    public function __invoke(?AbstractDto $dto): Result
    {
        $result = $this->repository->create();
        return Result::success($result);
    }
}
