<?php

namespace App\Repositoris;

use App\DTO\JobRequestDTO;
use App\Interfaces\JobRepositoryInterface;
use App\Models\Job;
use Illuminate\Support\Facades\Auth;

class JobRepository implements JobRepositoryInterface
{
    public function findJobById($id) {
        return Job::lazyById($id);
    }

    public function findJobs()
    {
        return Job::lazy();
    }

    public function findJobsWithoutPagination()
    {
        return Job::get();
    }

    public function findAllJobpagination(string $search ='', int $perPage = 10) {
        return Job::when($search, function ($q) use ($search) {
            $q->where('name','like','%'. $search .'%');
        })
        ->latest()
        ->paginate($perPage);
    }

    public function createJob($jobMakerId,JobRequestDTO $request)
    {
        if(Auth::check()) {
            return Job::create([
                'job_maker_id' => $jobMakerId,
                'name' => $request->name,
                'description' => $request->description,
                'type' => $request->type,
                'location' => $request->location,
                'experience' => $request->experience,
                'education' => $request->education,
                ]);
        } else {
            return null;
        }
    }

    public function updateJob($id,$jobMakerId, JobRequestDTO $request)
    {
         return Job::where('id', $id) ->update([
            'job_maker_id' => $jobMakerId,
            'name' => $request->name,
            'description' => $request->description,
            'type' => $request->type,
            'location' => $request->location,
            'experience' => $request->experience,
            'education' => $request->education,
        ]);
    }

    public function removeJob($id) {
        return Job::where('id', $id) -> delete();
    }
}
