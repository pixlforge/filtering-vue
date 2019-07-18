<?php

namespace App\Http\Controllers\Courses;

use App\Models\Course;
use App\Http\Controllers\Controller;

class CourseController extends Controller
{
    /**
     * Undocumented function
     *
     * @return void
     */
    public function index()
    {
        return Course::get();
    }
}
