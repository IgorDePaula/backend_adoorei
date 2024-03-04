<?php

namespace Sales\Application\Actions;

use Core\Application\AbstractDto;
use Core\Application\ActionInterface;
use Core\Infrastructure\Repository\RepositoryInterface;
use Core\Shared\Result;

class ListSale implements ActionInterface
{
    public function __construct(private readonly RepositoryInterface $repository)
    {

    }

    public function __invoke(?AbstractDto $dto): Result
    {
        $result = $this->repository->list();
        return Result::success($result);
    }
}
