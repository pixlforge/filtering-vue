<?php

namespace App\Http\Controllers\Courses;

use App\Models\Course;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Http\Resources\Courses\CourseResource;

class CourseController extends Controller
{
    /**
     * Undocumented function
     *
     * @return void
     */
    public function index(Request $request)
    {
        return CourseResource::collection(
            Course::with(['subjects', 'users'])
                ->filter($request, $this->getFilters())
                ->paginate(4)
        );
    }

    protected function getFilters()
    {
        return [
            //
        ];
    }
}
