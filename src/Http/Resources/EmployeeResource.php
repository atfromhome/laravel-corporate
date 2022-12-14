<?php

declare(strict_types=1);

namespace FromHome\Corporate\Http\Resources;

use FromHome\Corporate\Contract\Model\Employee;
use Illuminate\Http\Resources\Json\JsonResource;

final class EmployeeResource extends JsonResource
{
    public function toArray($request): array
    {
        /** @var Employee $employee */
        $employee = $this->resource;

        return $employee->toArray();
    }
}
