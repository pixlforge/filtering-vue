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
        $courses = Course::with('subjects')
            ->latest()
            ->filter($request, $this->getFilters())
            ->get();

        return response()->json($courses, 200);
    }

    protected function getFilters()
    {
        return [
            //
        ];
    }
}
