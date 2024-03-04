<?php

namespace Sales\Infrastructure\Repository;

use Core\Domain\DirectorInterface;
use Core\Domain\EntityInterface;
use Core\Infrastructure\Repository\RepositoryInterface;
use Illuminate\Database\Eloquent\Model;
use Sales\Domain\SaleStatusEnum;
use Sales\Shared\SaleCollection;

class SaleRepository implements RepositoryInterface
{
    public function __construct(
        private readonly Model             $model,
        private readonly DirectorInterface $director
    )
    {

    }

    public function list(): SaleCollection
    {
        $all = $this->model->all();

        $collection = new SaleCollection();

        foreach ($all as $product) {
            $collection->add($this->director->make($product->toArray()));
        }

        return $collection;
    }

    public function create(): EntityInterface
    {
        $register = $this->model->create(['status' => SaleStatusEnum::OPEN, 'amount' => 0]);
        return $this->director->make($register->toArray());
    }

}
