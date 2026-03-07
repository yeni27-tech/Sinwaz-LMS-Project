<?php

use App\Http\Controllers\AnswerController;
use App\Http\Controllers\CourseController;
use App\Http\Controllers\DivisiController;
use App\Http\Controllers\GoogleController;
use App\Http\Controllers\JobController;
use App\Http\Controllers\MaterialController;
use App\Http\Controllers\QuizController;
use App\Http\Controllers\TestController;
use App\Http\Controllers\UserController;
use Illuminate\Support\Facades\Route;

Route::get('/home', function() {
    return view('pages.landingPage.home');
}) -> name('home');


Route::prefix('quiz')->group(function () {
        Route::get('/{id}/edit', [QuizController::class,'createQuizSheetDetail']);
        Route::get('/attempt/{id}', [QuizController::class,'quizAttemptPage'])->name('quiz.attempt');
        Route::get('/attempt/{id}/result', [QuizController::class, 'quizResult']) -> name('quiz.result');
        Route::delete('/{id}', [QuizController::class,'destroy'])->name('quiz.destroy');
});

Route::prefix('user')->group(function () {
    Route::post('/', [UserController::class,'store'])->name('user.store');
    Route::put('/{id}', [UserController::class,'update'])->name('user.update');
    Route::delete('/{id}', [UserController::class,'destroy'])->name('user.destroy');
});

Route::prefix('divisi')->group(function () {
    Route::post('/', [DivisiController::class,'store'])->name('divisi.store');
    Route::put('/{id}', [DivisiController::class,'update'])->name('divisi.update');
    Route::delete('/{id}', [DivisiController::class,'destroy'])->name('divisi.destroy');
});

Route::prefix('job')->group(function () {
    Route::post('/', [JobController::class,'store'])->name('job.store');
    Route::put('/{id}', [JobController::class,'update'])->name('job.update');
    Route::delete('/{id}', [JobController::class,'destroy'])->name('job.destroy');
});

Route::prefix('course')->group(function () {
    Route::post('/', [CourseController::class,'store'])->name('course.store');
    Route::put('/{id}', [CourseController::class,'update'])->name('course.update');
    Route::delete('/{id}', [CourseController::class,'destroy'])->name('course.destroy');
});

Route::prefix('job')->group(function () {
    Route::post('/', [JobController::class,'store'])->name('job.store');
    Route::put('/{id}', [JobController::class,'update'])->name('job.update');
    Route::delete('/{id}', [JobController::class,'destroy'])->name('job.destroy');
});

// belum dites
Route::prefix('material')->group(function () {
    Route::post('/', [MaterialController::class,'store'])->name('material.store');
    Route::put('/{id}', action: [MaterialController::class,'update'])->name('material.update');
    Route::delete('/{id}', action: [MaterialController::class,'destroy'])->name('material.destroy');
});

Route::prefix('quiz')->group(function () {
    Route::post('/', [QuizController::class,'store'])->name('quiz.store');
});

Route::prefix('answer')->group(function () {
    Route::post('/', [AnswerController::class,'store'])->name('answer.store');
});



require __DIR__.'/auth.php';
require __DIR__.'/admin.php';
require __DIR__.'/employee.php';
