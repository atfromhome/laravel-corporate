<?php

declare(strict_types=1);

namespace FromHome\Corporate\Http\Responses;

use Illuminate\Http\JsonResponse;
use FromHome\Corporate\Contract\Response;
use FromHome\Corporate\Http\Resources\DivisionResource;
use Illuminate\Contracts\Pagination\LengthAwarePaginator;

final class FilterDivisionResponse implements Response\FilterDivisionResponse
{
    public function __construct(
        private readonly LengthAwarePaginator $paginator
    ) {
    }

    public function toResponse($request): JsonResponse
    {
        return DivisionResource::collection($this->paginator)->toResponse($request);
    }
}
