<?php

namespace App\Services;

use App\DTO\JobRequestDTO;
use App\Interfaces\JobRepositoryInterface;
use Illuminate\Support\Facades\Auth;

class JobService
{
    public $jobRepositoryInterface;
    public function __construct(JobRepositoryInterface $jobRepositoryInterface)
    {
        $this->jobRepositoryInterface = $jobRepositoryInterface;
    }

    public function getJobs() {
        try {
            return $this->jobRepositoryInterface->findJobs();
        } catch (\Throwable $th) {
            throw $th;
        }
    }
    public function getJobsWithoutPagination() {
        try {
            return $this->jobRepositoryInterface->findJobsWithoutPagination();
        } catch (\Throwable $th) {
            throw $th;
        }
    }

    public function getAllJobPagination(string $search = '', int $perPage = 10) {
        try {
            return $this -> jobRepositoryInterface -> findAllJobpagination($search, $perPage);
        } catch (\Throwable $th) {
            throw $th;
        }
    }

    public function getJobById($jobId) {
        try {
            return $this->jobRepositoryInterface->findJobById($jobId);
        } catch (\Throwable $th) {
            throw $th;
        }
    }

    public function postJob($jobMakerId, JobRequestDTO $request) {
        try {
            $newJob = $this->jobRepositoryInterface->createJob($jobMakerId,$request);

            return $newJob;
        } catch (\Throwable $th) {
            throw $th;
        }
    }

    public function putJob($id, $jobMakerId, JobRequestDTO $request) {
        try {
            $this->jobRepositoryInterface->updateJob($id,$jobMakerId,$request);
        } catch (\Throwable $th) {
            throw $th;
        }
    }

      public function deleteJob($id) {
        try {
            $this->jobRepositoryInterface-> removeJob($id);
        } catch (\Throwable $th) {
            throw $th;
        }
    }
}
