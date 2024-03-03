<?php

namespace Core\Domain;

use Core\Shared\Collection;

interface BuilderInterface
{
    public function build(): EntityInterface|Collection;
}
