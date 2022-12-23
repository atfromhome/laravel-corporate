<?php

declare(strict_types=1);

namespace FromHome\Corporate\Http\Responses;

use Illuminate\Http\JsonResponse;
use FromHome\Corporate\Contract\Response;
use FromHome\Corporate\Contract\Model\Employee;
use Illuminate\Database\Eloquent\Relations\Relation;
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
        $employee = $this->employee->loadMissing([
            'position' => fn (Relation $relation) => $relation->select(['id', 'uuid', 'name']),
            'division' => fn (Relation $relation) => $relation->select(['id', 'uuid', 'name']),
            'branch' => fn (Relation $relation) => $relation->select(['id', 'uuid', 'name']),
        ]);

        return EmployeeResource::make($employee)->toResponse($request);
    }
}
