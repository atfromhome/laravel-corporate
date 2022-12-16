<?php

declare(strict_types=1);

namespace FromHome\Corporate\Contract\Repository;

use Illuminate\Http\Request;
use FromHome\Corporate\Contract\Model\Position;
use Illuminate\Contracts\Pagination\LengthAwarePaginator;

interface PositionRepository
{
    public function findUsingId(int|string $id): ?Position;

    public function findOrFailUsingId(int|string $id): ?Position;

    public function filter(Request $request): LengthAwarePaginator;
}
