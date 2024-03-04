<?php

namespace Product\Application\Dto;

use Core\Application\AbstractDto;

class ListProductDto extends AbstractDto
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
