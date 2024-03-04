<?php

namespace Sales\Application;

use Sales\Application\Actions\ListSale;

enum ActionEnum: string
{
    case ListSaleDto = ListSale::class;
}
