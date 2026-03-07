<?php

namespace App\Http\Controllers;

use App\Http\Requests\MaterialRequest;
use App\Models\Material;
use App\Services\CourseService;
use App\Services\MaterialService;
use Illuminate\Http\Request;

class MaterialController extends Controller
{
   public MaterialService $materialService;
   public CourseService $courseService;

   public function __construct(MaterialService $materialService, CourseService $courseService) {
        $this->materialService = $materialService;
        $this->courseService = $courseService;
   }

   public function adminDashboard() {
        return view('pages.dashboard.admin.material');
   }

    public function materialDetail($id) {
        return view('pages.employee.material-detail-page');
    }
    public function index()
    {
        $materials = $this -> materialService->getMaterials();
        $courses = $this -> courseService -> getCourses();

        return view("pages.dashboard.admin.material", compact("materials", 'courses'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('pages.dashboard.admin.material.create-material');
    }

    public function edit($id)
    {
        return view('pages.dashboard.admin.material.update-material');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(MaterialRequest $request)
    {
        $newMaterial = $this -> materialService -> postMaterial($request -> toDTO());

        return redirect() -> route('dashboard.admin.course');
    }

    public function update($id, MaterialRequest $request)
    {
        $this -> materialService -> putMaterial($id, $request -> toDTO());

        return redirect() -> route('dashboard.admin.material');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
    {
        $this -> materialService -> deleteMaterial($id);

        return redirect() -> route('dashboard.admin.material');
    }
}
