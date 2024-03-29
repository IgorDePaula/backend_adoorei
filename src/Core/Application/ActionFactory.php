<?php

namespace Core\Application;

use ArrayObject;
use Core\Shared\Result;
use Illuminate\Contracts\Container\Container;
use Illuminate\Database\Eloquent\Model;

// @codeCoverageIgnoreStart
class ActionFactory
{
    private ArrayObject $items;
    private Container $app;

    public function __construct(string $actions, Container $app)
    {
        $this->app = $app;
        $this->items = new ArrayObject();
        $this->register($actions);
    }

    protected function register(string $actions): void
    {
        foreach ($actions::cases() as $action) {
            $this->items->offsetSet($action->name, $action->value);
        }
    }

    /**
     * @param AbstractDto $dto
     * @return Model
     * @throws \Exception
     */
    public function makeAction(AbstractDto $dto): Result
    {
        $action = class_basename($dto);
        if (!$this->items->offsetExists($action)) {
            throw new \Exception('Enum not found');
        }
        $action = $this->app->make($this->items->offsetGet($action));
        return $action($dto);
    }

}
// @codeCoverageIgnoreEnd
