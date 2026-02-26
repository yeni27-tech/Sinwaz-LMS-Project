<?php

namespace App\Interfaces;

use App\DTO\JobRequestDTO;

interface JobRepositoryInterface
{
    public function findJobById($id);
    public function findJobs();
    public function findJobsWithoutPagination();
    public function findAllJobpagination(string $search ='', int $perPage = 10);
    public function createJob($jobMakerId,JobRequestDTO $data);
    public function updateJob($id,$jobMakerId,JobRequestDTO $data);
    public function removeJob($id);
}
