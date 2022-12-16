<?php

declare(strict_types=1);

namespace FromHome\Corporate\Http\Responses;

use Illuminate\Http\JsonResponse;
use FromHome\Corporate\Contract\Response;
use FromHome\Corporate\Http\Resources\PositionResource;
use Illuminate\Contracts\Pagination\LengthAwarePaginator;

final class FilterPositionResponse implements Response\FilterPositionResponse
{
    public function __construct(
        private readonly LengthAwarePaginator $paginator
    ) {
    }

    public function toResponse($request): JsonResponse
    {
        return PositionResource::collection($this->paginator)->toResponse($request);
    }
}
