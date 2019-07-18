<?php

namespace App\Filters\Course\Ordering;

use App\Filters\FilterAbstract;
use Illuminate\Database\Eloquent\Builder;

class ViewsOrder extends FilterAbstract
{
    public function filter(Builder $builder, $value)
    {
        $value = $this->resolveOrderDirect($value);

        return $builder->orderBy('views', $value);
    }
}