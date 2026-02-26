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

}
