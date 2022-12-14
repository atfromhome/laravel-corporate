<?php

declare(strict_types=1);

namespace FromHome\Corporate\Contract\Repository;

use Illuminate\Http\Request;
use FromHome\Corporate\Contract\Model\Employee;
use Illuminate\Contracts\Pagination\LengthAwarePaginator;

interface EmployeeRepository
{
    public function findUsingId(int|string $id): ?Employee;

    public function findOrFailUsingId(int|string $id): ?Employee;

    public function filter(Request $request): LengthAwarePaginator;
}
