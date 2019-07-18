<?php

namespace App\Models;

use App\Filters\Course\CourseFilters;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Builder;

class Course extends Model
{
    /**
     * The attributes to be cast to native types.
     *
     * @var array
     */
    protected $casts = [
        'free' => 'boolean',
    ];

    public function scopeFilter(Builder $builder, $request, array $filters = [])
    {
        return (new CourseFilters($request))->add($filters)->filter($builder);
    }
}
