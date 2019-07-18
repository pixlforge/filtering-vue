<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

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
}
