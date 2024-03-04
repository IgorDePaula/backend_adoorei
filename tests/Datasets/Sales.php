<?php

dataset('sales', function () {
    return [
        [
            'id' => 1,
            'amount' => 67.7,
            'products' => [
                [
                    'id' => 1,
                    'name' => 'Product 1',
                    'description' => 'productc1 description',
                    'price' => 10.9,
                    'quantity' => 2,
                ],
                ['id' => 2,
                    'name' => 'Product 2',
                    'description' => 'product 2 description',
                    'price' => 15.3,
                    'quantity' => 3,
                ]
            ]
        ]
    ];
});
