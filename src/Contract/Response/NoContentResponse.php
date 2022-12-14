<?php

declare(strict_types=1);

namespace FromHome\Corporate\Contract\Response;

use Illuminate\Http\JsonResponse;
use Illuminate\Contracts\Support\Responsable;

abstract class NoContentResponse implements Responsable
{
    public function toResponse($request): JsonResponse
    {
        return new JsonResponse('', JsonResponse::HTTP_NO_CONTENT);
    }
}
