<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class HomePageController extends Controller
{
    public function adminDashboard() {
        return view('pages.dashboard.admin.home');
    }

     public function employeeDashboard() {
        return view('pages.employee.home-page');
    }
}
