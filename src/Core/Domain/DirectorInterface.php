<?php

namespace Core\Domain;

use Core\Shared\Collection;

interface DirectorInterface
{
    public function make(array $data): EntityInterface|Collection;
}
