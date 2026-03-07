<?php

namespace App\Http\Controllers;

use App\Http\Requests\JobRequest;
use App\Models\Job;
use App\Services\JobService;
use Illuminate\Support\Facades\Auth;

class JobController extends Controller
{
    public $jobService;

    public function __construct(JobService $jobService) {
        $this->jobService = $jobService;
    }

    public function adminDashboard() {
        return view("pages.dashboard.admin.job");
    }
    public function index()
    {
        $jobs = $this -> jobService -> getJobs();
        // dd(Auth::user() -> id);

        return view("pages.dashboard.admin.job", compact("jobs"));
    }

    public function create() {
        return view("pages.dashboard.admin.job.create-job");
    }

    public function edit($id) {
        return view("pages.dashboard.admin.job.update-job");
    }

    public function update($id, JobRequest $request) {
        $this -> jobService -> putJob($id,Auth::user() -> id,$request -> toDTO());

        return redirect() -> route("dashboard.admin.job");

    }

    public function store(JobRequest $request) {
        $this -> jobService -> postJob(Auth::user() -> id,$request -> toDTO());

        return redirect() -> route("dashboard.admin.job");
    }


    public function destroy($id) {
        $this -> jobService -> deleteJob($id);

        return redirect() -> route("dashboard.admin.job");
    }
}
