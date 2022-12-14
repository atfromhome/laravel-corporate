<?php

declare(strict_types=1);

namespace FromHome\Corporate\Http\Responses;

use Illuminate\Http\JsonResponse;
use FromHome\Corporate\Contract\Response;
use FromHome\Corporate\Contract\Model\Employee;
use FromHome\Corporate\Http\Resources\EmployeeResource;

final class ShowEmployeeResponse implements
    Response\StoreEmployeeResponse,
    Response\ShowEmployeeResponse
{
    public function __construct(
        private readonly Employee $employee
    ) {
    }

    public function toResponse($request): JsonResponse
    {
        return EmployeeResource::make($this->employee)->toResponse($request);
    }
}
