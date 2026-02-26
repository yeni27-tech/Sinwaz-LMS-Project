<?php

namespace App\Services;

use App\DTO\CourseRequestDTO;
use App\Interfaces\CourseRepositoryInterface;

class CourseService
{
    public CourseRepositoryInterface $courseRepositoryInterface;

    public function __construct(CourseRepositoryInterface $courseRepositoryInterface)
    {
        $this->courseRepositoryInterface = $courseRepositoryInterface;
    }

    public function getCourses() {
        try {
            return $this->courseRepositoryInterface->findCourses();
        } catch (\Throwable $th) {
            throw $th;
        }
    }

    public function getAllCoursePagination(string $search = '', int $perPage = 10) {
        try {
            return $this->courseRepositoryInterface->findAllCoursePagination($search, $perPage);
        } catch (\Throwable $th) {
            throw $th;
        }
    }

    public function getCoursesWithoutPagination() {
        try {
            return $this->courseRepositoryInterface->findCoursesWithoutPagination();
        } catch (\Throwable $th) {
            throw $th;
        }
    }

    public function getCourseById($id) {
        try {
            return $this->courseRepositoryInterface->findCourseById($id);
        } catch (\Throwable $th) {
            throw $th;
        }
    }

    public function postCourse($tutorId, CourseRequestDTO $courseRequest) {
        try {
            return $this -> courseRepositoryInterface -> createCourse($tutorId,$courseRequest);
        } catch (\Throwable $th) {
            throw $th;
        }
    }

    public function putCourse($id, $tutorId, CourseRequestDTO $courseRequest): mixed {
        try {
            return $this -> courseRepositoryInterface -> updateCourse($id,$tutorId,$courseRequest);
        } catch (\Throwable $th) {
            throw $th;
        }
    }
    public function deleteCourse($id) {
        try {
            return $this -> courseRepositoryInterface -> removeCourse($id);
        } catch (\Throwable $th) {
            throw $th;
        }
    }
}
