<?php

namespace Sales\Domain;

enum SaleStatusEnum
{
    case OPEN;
    case CLOSED;
    case CANCELLED;
    case PAID;
}
