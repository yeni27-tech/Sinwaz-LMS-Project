<?php

namespace App\Http\Controllers;

use App\Http\Requests\CourseRequest;
use App\Models\Course;
use App\Services\CourseService;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class CourseController extends Controller
{
    public CourseService $courseService;

    public function __construct(CourseService $courseService) {
        $this->courseService = $courseService;
    }

    public function adminDashboard() {
        return view("pages.dashboard.admin.course");
    }

    public function courseDetail($id) {
        return view('pages.employee.course-detail-page');
    }
    public function index()
    {
        $courses = $this->courseService->getCourses();

        return view("pages.dashboard.admin.course", compact("courses"));
    }


    /**
     * Store a newly created resource in storage.
     */
    public function store(CourseRequest $request)
    {
         return $this -> courseService -> postCourse(Auth::user() -> id,$request->toDTO());
    }

    public function update($id, CourseRequest $request)
    {
         return $this ->courseService -> putCourse($id,Auth::user() -> id,$request->toDTO());
    }


    public function destroy($id)
    {
        return $this -> courseService -> deleteCourse($id);
    }
}
