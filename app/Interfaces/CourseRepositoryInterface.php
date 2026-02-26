<?php

namespace App\Interfaces;

use App\DTO\CourseRequestDTO;

interface CourseRepositoryInterface
{
    public function findCourseById($id);
    public function findCourses();
    public function findCoursesWithoutPagination();
    public function findAllCoursePagination($search ='', int $perPage = 10);
    public function createCourse($tutorId, CourseRequestDTO $data);
    public function updateCourse($id ,$tutorId, CourseRequestDTO $data);
    public function removeCourse($id);
}
