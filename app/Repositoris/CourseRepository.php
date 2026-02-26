<?php

namespace App\Repositoris;

use App\DTO\CourseRequestDTO;
use App\Interfaces\CourseRepositoryInterface;
use App\Models\Course;

class CourseRepository implements CourseRepositoryInterface
{
    public function findCourseById($id) {

       return Course::where('id', $id) -> first();
    }

    public function findAllCoursePagination($search ='', int $perPage = 10)
    {
        return Course::query()
            ->when($search, function ($q) use ($search) {
                $q->where('name', 'like', "%{$search}%")
                ->orWhere('email', 'like', "%{$search}%");
            })
            ->latest()
            ->paginate($perPage);
    }

    public function findCourses()
    {
        return Course::lazy();
    }

    public function findCoursesWithoutPagination()
    {
        return Course::get();
    }

    public function createCourse($tutorId, CourseRequestDTO $request)
    {
        return Course::create([
            'tutor_id' => $tutorId,
            'divisi_id' => $request->divisi_id,
            'name' => $request->name,
            'description' => $request->description,
        ]);
    }

    public function updateCourse($id, $tutorId,CourseRequestDTO $request)
    {
         return Course::where('id', $id) ->update([
            'tutor_id' => $tutorId,
            'divisi_id' => $request->divisi_id,
            'name' => $request->name,
            'description' => $request->description,
        ]);
    }

    public function removeCourse($id) {
        return Course::where('id', $id) -> delete();
    }
}
