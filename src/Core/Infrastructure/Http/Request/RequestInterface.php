<?php

namespace Core\Infrastructure\Http\Request;

use Core\Application\AbstractDto;

interface RequestInterface
{
    public function toDto(): AbstractDto;
}
