<?php

namespace Product\Infrastructure\Http\Request;


// @codeCoverageIgnoreStart
use Core\Application\AbstractDto;
use Core\Infrastructure\Http\Request\RequestInterface;
use Illuminate\Foundation\Http\FormRequest;
use Sales\Application\Dto\ListSaleDto;

class ListProductRequest extends FormRequest implements RequestInterface
{
    public function authorize(): bool
    {
        return true;
    }

    public function toDto(): AbstractDto
    {
        return new ListSaleDto();
    }
}
// @codeCoverageIgnoreEnd
