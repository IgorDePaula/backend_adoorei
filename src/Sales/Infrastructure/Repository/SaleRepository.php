<?php

namespace Sales\Infrastructure\Repository;

use Core\Domain\DirectorInterface;
use Core\Infrastructure\Repository\RepositoryInterface;
use Illuminate\Database\Eloquent\Model;
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

}
