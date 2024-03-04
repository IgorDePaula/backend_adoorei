<?php

namespace Product\Infrastructure\Repository;

use Core\Domain\DirectorInterface;
use Core\Infrastructure\Repository\RepositoryInterface;
use Illuminate\Database\Eloquent\Model;
use Product\Shared\ProductCollection;

class ProductRepository implements RepositoryInterface
{
    public function __construct(
        private readonly Model             $model,
        private readonly DirectorInterface $director
    )
    {

    }

    public function list(): ProductCollection
    {
        $all = $this->model->all();

        $collection = new ProductCollection();

        foreach ($all as $product) {
            $collection->add($this->director->make($product->toArray()));
        }

        return $collection;
    }

}
