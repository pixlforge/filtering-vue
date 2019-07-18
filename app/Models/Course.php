<?php

namespace App\Models;

use App\Filters\Course\CourseFilters;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Builder;

class Course extends Model
{
    /**
     * The attributes that should be cast to native types.
     *
     * @var array
     */
    protected $casts = [
        'free' => 'boolean',
    ];

    /**
     * The accessors to append to the model's array form.
     *
     * @var array
     */
    protected $appends = [
        'started',
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'users',
    ];

    public function scopeFilter(Builder $builder, $request, array $filters = [])
    {
        return (new CourseFilters($request))->add($filters)->filter($builder);
    }

    public function getStartedAttribute()
    {
        if (!auth()->check()) {
            return false;
        }

        return $this->users->contains(auth()->user());
    }

    /**
     * Subjects relationship.
     *
     * @return void
     */
    public function subjects()
    {
        return $this->morphToMany(Subject::class, 'subjectable');
    }

    /**
     * Users relationship.
     *
     * @return void
     */
    public function users()
    {
        return $this->belongsToMany(User::class);
    }
}
