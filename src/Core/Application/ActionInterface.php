<?php

namespace Core\Application;

use Core\Shared\Result;

interface ActionInterface
{
    public function __invoke(?AbstractDto $dto): Result;
}
