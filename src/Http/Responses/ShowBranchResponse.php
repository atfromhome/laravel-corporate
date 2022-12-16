<?php

declare(strict_types=1);

namespace FromHome\Corporate\Http\Responses;

use Illuminate\Http\JsonResponse;
use FromHome\Corporate\Contract\Response;
use FromHome\Corporate\Contract\Model\Branch;
use FromHome\Corporate\Http\Resources\BranchResource;

final class ShowBranchResponse implements
    Response\StoreBranchResponse,
    Response\ShowBranchResponse
{
    public function __construct(
        private readonly Branch $branch
    ) {
    }

    public function toResponse($request): JsonResponse
    {
        return BranchResource::make($this->branch)->toResponse($request);
    }
}
