<?php

declare(strict_types=1);

namespace FromHome\Corporate\Http\Responses;

use Illuminate\Http\JsonResponse;
use FromHome\Corporate\Contract\Response;
use FromHome\Corporate\Contract\Model\Division;
use FromHome\Corporate\Http\Resources\DivisionResource;

final class ShowDivisionResponse implements
    Response\StoreDivisionResponse,
    Response\ShowDivisionResponse
{
    public function __construct(
        private readonly Division $branch
    ) {
    }

    public function toResponse($request): JsonResponse
    {
        return DivisionResource::make($this->branch)->toResponse($request);
    }
}
