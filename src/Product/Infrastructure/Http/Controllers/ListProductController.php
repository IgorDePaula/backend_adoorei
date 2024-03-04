<?php

namespace Product\Infrastructure\Http\Controllers;

use Core\Application\ActionFactory;
use Core\Infrastructure\Errors\InfrastructureError;
use Core\Shared\Result;
use Illuminate\Http\JsonResponse;
use Product\Infrastructure\Http\Request\ListProductRequest;

class ListProductController
{
    public function __construct(private readonly ActionFactory $actionFactory)
    {

    }

    public function __invoke(ListProductRequest $request): JsonResponse
    {
        $result = $this->actionFactory->makeAction($request->toDto());
        return $this->createResponse($result);
    }

    private function createResponse(Result $result): JsonResponse
    {
        if ($result->isFailure()) {
            $class = get_class($result->getValue());
            return match ($class) {
                InfrastructureError::class => new JsonResponse(['success' => false, 'data' => $result->getValue()->getMessage()], JsonResponse::HTTP_NOT_ACCEPTABLE),
                default => new JsonResponse(['success' => false, 'data' => $result->getValue()->getMessage()], JsonResponse::HTTP_INTERNAL_SERVER_ERROR)
            };
        }
        return new JsonResponse(['success' => true, 'data' => $result->getValue()->toArray()], JsonResponse::HTTP_OK);
    }
}
