<?php

declare(strict_types=1);

namespace FromHome\Corporate\Repositories;

use Ramsey\Uuid\Uuid;
use Illuminate\Http\Request;
use Spatie\QueryBuilder\AllowedSort;
use Spatie\QueryBuilder\QueryBuilder;
use Spatie\QueryBuilder\AllowedFilter;
use Illuminate\Database\Eloquent\Builder;
use FromHome\Corporate\CorporateRegistrar;
use FromHome\Corporate\Contract\Repository;
use FromHome\Corporate\Contract\Model\Employee;
use FromHome\Corporate\Http\Filters\ActiveFilter;
use Illuminate\Database\Eloquent\Relations\Relation;
use Illuminate\Contracts\Pagination\LengthAwarePaginator;

final class EmployeeRepository implements Repository\EmployeeRepository
{
    public function findUsingId(int|string $id): ?Employee
    {
        $isUuid = Uuid::isValid((string) $id);

        return $this->newEloquentQuery()->where($isUuid ? 'uuid' : 'id', $id)->firstOr(fn () => null);
    }

    public function findOrFailUsingId(int|string $id): Employee
    {
        $isUuid = Uuid::isValid((string) $id);

        /** @var Employee */
        return $this->newEloquentQuery()->where($isUuid ? 'uuid' : 'id', $id)->firstOrFail();
    }

    public function filter(Request $request): LengthAwarePaginator
    {
        $builder = $this->newEloquentQuery()->with([
            'position' => fn (Relation $relation) => $relation->select(['id', 'uuid', 'name']),
            'division' => fn (Relation $relation) => $relation->select(['id', 'uuid', 'name']),
            'branch' => fn (Relation $relation) => $relation->select(['id', 'uuid', 'name']),
        ]);

        return QueryBuilder::for($builder, $request)->allowedFilters([
            AllowedFilter::partial('name', 'name'),
            AllowedFilter::exact('position', 'position_id'),
            AllowedFilter::exact('division', 'division'),
            AllowedFilter::exact('branch', 'branch_id'),
            AllowedFilter::custom('active', new ActiveFilter(), 'deactivated_at'),
        ])->allowedSorts([
            AllowedSort::field('name'),
        ])->paginate();
    }

    private function newEloquentQuery(): Builder
    {
        return CorporateRegistrar::getEmployeeModel()->newQuery();
    }
}
