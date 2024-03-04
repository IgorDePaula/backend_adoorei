<?php

namespace Sales\Application;

use Sales\Application\Actions\{CreateSale, ListSale};

enum ActionEnum: string
{
    case ListSaleDto = ListSale::class;
    case CreateSaleDto = CreateSale::class;
}
