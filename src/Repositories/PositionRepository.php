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
use FromHome\Corporate\Contract\Model\Position;
use FromHome\Corporate\Http\Filters\ActiveFilter;
use Illuminate\Contracts\Pagination\LengthAwarePaginator;

final class PositionRepository implements Repository\PositionRepository
{
    public function findUsingId(int|string $id): ?Position
    {
        $isUuid = Uuid::isValid((string) $id);

        return $this->newEloquentQuery()->where($isUuid ? 'uuid' : 'id', $id)->firstOr(fn () => null);
    }

    public function findOrFailUsingId(int|string $id): Position
    {
        $isUuid = Uuid::isValid((string) $id);

        /** @var Position */
        return $this->newEloquentQuery()->where($isUuid ? 'uuid' : 'id', $id)->firstOrFail();
    }

    public function filter(Request $request): LengthAwarePaginator
    {
        return QueryBuilder::for($this->newEloquentQuery(), $request)->allowedFilters([
            AllowedFilter::partial('name', 'name'),
            AllowedFilter::exact('parent', 'parent_id'),
            AllowedFilter::custom('active', new ActiveFilter(), 'deactivated_at'),
        ])->allowedSorts([
            AllowedSort::field('name'),
        ])->paginate();
    }

    private function newEloquentQuery(): Builder
    {
        return CorporateRegistrar::getPositionModel()->newQuery();
    }
}
