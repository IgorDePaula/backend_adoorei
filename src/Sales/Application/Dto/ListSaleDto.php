<?php

namespace Sales\Application\Dto;

use Core\Application\AbstractDto;

class ListSaleDto extends AbstractDto
{

    static public function fromArray(array $data): static
    {
        return new static();
    }

    public function toArray(): array
    {
        return [];
    }
}
