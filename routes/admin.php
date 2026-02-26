<?php

use App\Http\Controllers\AnswerController;
use App\Http\Controllers\CourseController;
use App\Http\Controllers\GoogleController;
use App\Http\Controllers\HomePageController;
use App\Http\Controllers\JobController;
use App\Http\Controllers\MaterialController;
use App\Http\Controllers\QuizController;
use App\Http\Controllers\TestController;
use App\Http\Controllers\UserController;
use Illuminate\Support\Facades\Route;



Route::prefix('dashboard')->group(function () {
    Route::prefix('admin')->group(function () {
        Route::get('/', [HomePageController::class,'adminDashboard']) -> name('dashboard.admin');
        Route::get('/user', [UserController::class,'adminDashboard']) -> name('dashboard.admin.user');
        Route::get('/job', [JobController::class,'adminDashboard']) -> name('dashboard.admin.job');
        Route::get('/course', [CourseController::class,'adminDashboard'])->name('dashboard.admin.course');
        Route::get('/material', [MaterialController::class,'index']);

        Route::prefix('quiz')->group(function () {
            Route::get('/', [QuizController::class, 'adminDashboard']) -> name('dashboard.admin.quiz');
            Route::get('/quiz/create', [QuizController::class,'createQuizSheet']) -> name('dashboard.admin.quiz.create');
            Route::get('/{id}/edit', [QuizController::class,'createQuizSheetDetail']) -> name('dashboard.admin.quiz.detail');
        });
    });
});

