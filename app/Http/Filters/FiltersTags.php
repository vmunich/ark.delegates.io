<?php

namespace App\Http\Filters;

use Spatie\QueryBuilder\Filters\Filter;
use Illuminate\Database\Eloquent\Builder;

class FiltersTags implements Filter
{
    public function __invoke(Builder $query, $value, string $property) : Builder
    {
        return $query->withAnyTags($value);
    }
}
