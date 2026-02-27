<?php
use App\Http\Controllers\CourseController;
use App\Http\Controllers\HomePageController;
use App\Http\Controllers\MaterialController;
use App\Http\Controllers\QuizController;
use Illuminate\Support\Facades\Route;

// Route::prefix('dashboard')->group(function () {
    Route::prefix('employee')->group(function () {
        Route::get('/', [HomePageController::class,'employeeDashboard']) -> name('employee.home');

        Route::get('/leaderboard', function() {
            return view('pages.employee.leaderboard-page');
        }) -> name('employee.leaderboard');

        Route::get('profile', function() {
            return view('pages.employee.profile-page');
        }) -> name('employee.profile');

        Route::get('/quiz/confirmation/{id}', [QuizController::class, 'quizStartConfirmation']) -> name('quiz.start.confirmation');
        Route::get('/quiz/{id}', [QuizController::class, 'quizDetail']) -> name('quiz.start');

        Route::get('/course/{id}', [CourseController::class, 'courseDetail']) -> name('course.detail');

        Route::get('/material/{id}', [MaterialController::class, 'materialDetail']) -> name('material.detail');

    });
// });
