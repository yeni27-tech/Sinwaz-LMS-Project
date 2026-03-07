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

    public function adminCourseDetail($id) {
        return view('pages.dashboard.admin.course-detail');
    }

    public function create() {
        return view("pages.dashboard.admin.course.create-course");
    }

    public function edit() {
        return view("pages.dashboard.admin.course.update-course");
    }

    public function store(CourseRequest $request)
    {
         $this -> courseService -> postCourse(Auth::user() -> id,$request->toDTO());

        return redirect()->route("dashboard.admin.course");

    }

    public function update($id, CourseRequest $request)
    {
          $this ->courseService -> putCourse($id,Auth::user() -> id,$request->toDTO());

          return redirect()->route("dashboard.admin.course");
    }


    public function destroy($id)
    {
        $this -> courseService -> deleteCourse($id);

          return redirect()->route("dashboard.admin.course");

    }
}
