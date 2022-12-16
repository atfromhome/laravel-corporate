<?php

declare(strict_types=1);

namespace FromHome\Corporate\Contract\Repository;

use Illuminate\Http\Request;
use FromHome\Corporate\Contract\Model\Branch;
use Illuminate\Contracts\Pagination\LengthAwarePaginator;

interface BranchRepository
{
    public function findUsingId(int|string $id): ?Branch;

    public function findOrFailUsingId(int|string $id): ?Branch;

    public function filter(Request $request): LengthAwarePaginator;
}
