<?php

namespace App\Filters;

use Illuminate\Database\Eloquent\Builder;
use Illuminate\Support\Arr;

abstract class FilterAbstract
{
    abstract public function filter(Builder $builder, $value);

    public function mappings()
    {
        return [];
    }

    protected function resolveFilterValue($key)
    {
        return Arr::get($this->mappings(), $key);
    }

    protected function resolveOrderDirect($direction)
    {
        return array_get([
            'desc' => 'desc',
            'asc' => 'asc'
        ], $direction, 'desc');
    }
}