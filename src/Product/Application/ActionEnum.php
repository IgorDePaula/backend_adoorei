<?php

namespace Product\Application;

use Product\Application\Actions\ListProduct;

enum ActionEnum: string
{
    case ListProductDto = ListProduct::class;
}
