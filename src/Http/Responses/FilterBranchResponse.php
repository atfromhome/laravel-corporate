<?php

declare(strict_types=1);

namespace FromHome\Corporate\Http\Responses;

use Illuminate\Http\JsonResponse;
use FromHome\Corporate\Contract\Response;
use FromHome\Corporate\Http\Resources\BranchResource;
use Illuminate\Contracts\Pagination\LengthAwarePaginator;

final class FilterBranchResponse implements Response\FilterBranchResponse
{
    public function __construct(
        private readonly LengthAwarePaginator $paginator
    ) {
    }

    public function toResponse($request): JsonResponse
    {
        return BranchResource::collection($this->paginator)->toResponse($request);
    }
}
