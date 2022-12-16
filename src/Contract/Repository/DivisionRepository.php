<?php

declare(strict_types=1);

namespace FromHome\Corporate\Contract\Repository;

use Illuminate\Http\Request;
use FromHome\Corporate\Contract\Model\Division;
use Illuminate\Contracts\Pagination\LengthAwarePaginator;

interface DivisionRepository
{
    public function findUsingId(int|string $id): ?Division;

    public function findOrFailUsingId(int|string $id): ?Division;

    public function filter(Request $request): LengthAwarePaginator;
}
