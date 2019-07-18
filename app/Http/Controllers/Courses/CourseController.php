<?php

namespace App\Http\Controllers\Courses;

use App\Models\Course;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class CourseController extends Controller
{
    /**
     * Undocumented function
     *
     * @return void
     */
    public function index(Request $request)
    {
        return Course::with('subjects')
            ->filter($request, $this->getFilters())
            ->get();
    }

    protected function getFilters()
    {
        return [
            //
        ];
    }
}
