<?php

declare(strict_types=1);

namespace FromHome\Corporate\Http\Filters;

use Illuminate\Database\Eloquent\Model;
use Spatie\QueryBuilder\Filters\Filter;
use Illuminate\Database\Eloquent\Builder;

/**
 * @template-implements Filter<Model>
 */
final class ActiveFilter implements Filter
{
    public function __invoke(Builder $query, $value, string $property)
    {
        return $value ? $query->whereNull($property) : $query->whereNotNull($property);
    }
}
