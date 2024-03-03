<?php

namespace Core\Infrastructure\Http;

use Core\Infrastructure\Http\Request\RequestInterface;

interface ControllerInterface
{
    public function execute(RequestInterface $request);
}
