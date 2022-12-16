<?php

declare(strict_types=1);

namespace FromHome\Corporate\Http\Responses;

use Illuminate\Http\JsonResponse;
use FromHome\Corporate\Contract\Response;
use FromHome\Corporate\Contract\Model\Position;
use FromHome\Corporate\Http\Resources\PositionResource;

final class ShowPositionResponse implements
    Response\StorePositionResponse,
    Response\ShowPositionResponse
{
    public function __construct(
        private readonly Position $branch
    ) {
    }

    public function toResponse($request): JsonResponse
    {
        return PositionResource::make($this->branch)->toResponse($request);
    }
}
