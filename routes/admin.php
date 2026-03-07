<?php

use App\Http\Controllers\AnswerController;
use App\Http\Controllers\CourseController;
use App\Http\Controllers\DivisiController;
use App\Http\Controllers\GoogleController;
use App\Http\Controllers\HomePageController;
use App\Http\Controllers\JobController;
use App\Http\Controllers\MaterialController;
use App\Http\Controllers\QuizController;
use App\Http\Controllers\TestController;
use App\Http\Controllers\UserController;
use App\Http\Middleware\AdminMiddleware;
use Illuminate\Support\Facades\Route;


Route::middleware([AdminMiddleware::class])->group(function () {
    Route::prefix('dashboard')->group(function () {
        Route::prefix('admin')->group(function () {
            Route::get('/', [HomePageController::class,'adminDashboard']) -> name('dashboard.admin');
            Route::get('/leaderboard', function() {
                return view('pages.dashboard.admin.leaderboard');
            }) -> name('dashboard.admin.leaderboard');

            Route::get('/user', [UserController::class,'adminDashboard']) -> name('dashboard.admin.user');
            Route::get('/user/create', [UserController::class,'create']) -> name('dashboard.admin.user.create');
            Route::get('/user/{id}/edit', [UserController::class,'edit']) -> name('dashboard.admin.user.edit');

            Route::get('/divisi', [DivisiController::class,'adminDashboard']) -> name('dashboard.admin.divisi');
            Route::get('/divisi/create', [DivisiController::class,'create']) -> name('dashboard.admin.divisi.create');
            Route::get('/divisi/{id}/edit', [DivisiController::class,'edit']) -> name('dashboard.admin.divisi.edit');

            Route::get('/job', [JobController::class,'adminDashboard']) -> name('dashboard.admin.job');
            Route::get('/job/craete', [JobController::class,'create']) -> name('dashboard.admin.job.create');
            Route::get('/job/{id}/edit', [JobController::class,'edit']) -> name('dashboard.admin.job.edit');

            Route::get('/course', [CourseController::class,'adminDashboard'])->name('dashboard.admin.course');
            Route::get('/course/create', [CourseController::class,'create'])->name('dashboard.admin.course.create');
            Route::get('/course/{id}/edit', [CourseController::class,'edit'])->name('dashboard.admin.course.edit');
            Route::get('/course/{id}/', [CourseController::class,'adminCourseDetail'])->name('dashboard.admin.course.detail');

            // Route::get('/material', [MaterialController::class,'adminDashboard'])->name('dashboard.admin.material');
            Route::get('/material/create', [MaterialController::class,'create'])->name('dashboard.admin.material.create');
            Route::get('/material/{id}/edit', [MaterialController::class,'edit'])->name('dashboard.admin.material.edit');

            Route::prefix('quiz')->group(function () {
                Route::get('/', [QuizController::class, 'adminDashboard']) -> name('dashboard.admin.quiz');
                Route::get('/quiz/create', [QuizController::class,'createQuizSheet']) -> name('dashboard.admin.quiz.create');
                Route::get('/{id}/edit', [QuizController::class,'createQuizSheetDetail']) -> name('dashboard.admin.quiz.detail');
            });
        });
    });
});
