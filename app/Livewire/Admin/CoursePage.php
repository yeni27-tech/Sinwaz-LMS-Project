<?php

namespace App\Livewire\Admin;

use App\Services\CourseService;
use Livewire\Attributes\Computed;
use Livewire\Attributes\Url;
use Livewire\Component;
use Livewire\WithPagination;
use SweetAlert2\Laravel\Traits\WithSweetAlert;

class CoursePage extends Component
{
    use WithPagination;
    use WithSweetAlert;
    public $id;
    public $name;
    public $description;
    public $tutor_id;
    public $divisi_id;
    public bool $showCreateCourseForm = false;
    public bool $showUpdateCourseForm = false;


    #[Url(as: 'search', except: '')]
    public string $search = '';

    public int $perPage = 10;

    public function placeholder() {
        return view('components.loading');
    }

    public function courseService() {
        return app(CourseService::class);
    }
    public function updatingSearch(): void
    {
        $this->resetPage();
    }

    #[Computed]
    public function quizzes()
    {
        $courseService = app(CourseService::class);

        // Pastikan getUsers menerima search/perPage biar rapi (lihat service di bawah)
        return $courseService->getCoursesWithoutPagination();
    }

    #[Computed]
    public function coursePagination()
    {
        $courseService = app(CourseService::class);

        // Pastikan getUsers menerima search/perPage biar rapi (lihat service di bawah)
        return $courseService->getAllCoursePagination($this-> search, $this->perPage);
    }


    public function openCreateCourseForm() {
        $this->showCreateCourseForm = true;
    }

    public function closeCreateCourseForm() {
       return $this->showCreateCourseForm = false;
    }

    public function openUpdateCourseForm($id,$name,$description,$divisi_id) {
        $this->name = $name;
        $this->id = $id;
        $this->description = $description;
        $this->divisi_id = $divisi_id;

        $this->showUpdateCourseForm = true;
    }

    public function closeUpdateCourseForm() {
        $this->showUpdateCourseForm = false;
    }

    public function deleteCourse($id) {
        $courseService = app(CourseService::class);

        return $courseService->deleteCourse($id);
    }

    public function render()
    {
        return view('livewire.admin.course-page');
    }
}
