<?php

namespace App\Http\Controllers\Courses;

use App\Http\Controllers\Controller;
use App\Filters\Course\CourseFilters;
use App\Http\Resources\Courses\CourseFilterResource;

class CourseFilterController extends Controller
{
    public function __invoke()
    {
        return new CourseFilterResource(CourseFilters::mappings());
    }
}
