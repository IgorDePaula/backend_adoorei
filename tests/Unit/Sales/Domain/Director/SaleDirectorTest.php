<?php

use Sales\Domain\Director\SaleDirector;
use Sales\Domain\Entity\SaleEntity;

it('sloud direct a product', function ($id, $amount, $products) {

    $director = new SaleDirector();
    $build = $director->make([
        'id' => $id,
        'amount' => $amount,
        'products' => $products,
    ]);

    expect($build)->toBeInstanceOf(SaleEntity::class);

})->with('sales');
