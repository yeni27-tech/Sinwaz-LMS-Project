<?php

namespace App\Providers;

use App\Interfaces\AnswerRepositoryInterface;
use App\Interfaces\CourseRepositoryInterface;
use App\Interfaces\DivisiRepositoryInterface;
use App\Interfaces\JobRepositoryInterface;
use App\Interfaces\MaterialRepositoryInterface;
use App\Interfaces\QuestionRepositoryInterface;
use App\Interfaces\QuizAttemptAnswerRepositoryInterface;
use App\Interfaces\QuizAttemptRepositoryInterface;
use App\Interfaces\QuizRepositoryInterface;
use App\Interfaces\UserRepositoryInterface;
use App\Repositoris\AnswerRepository;
use App\Repositoris\CourseRepository;
use App\Repositoris\DivisiRepository;
use App\Repositoris\JobRepository;
use App\Repositoris\MaterialRepository;
use App\Repositoris\QuestionRepository;
use App\Repositoris\QuizAttemptAnswerRepository;
use App\Repositoris\QuizAttemptRepository;
use App\Repositoris\QuizRepository;
use App\Repositoris\UserRepository;
use Illuminate\Support\ServiceProvider;

class AppServiceProvider extends ServiceProvider
{
public function register(): void
    {
        $bindings = [
            DivisiRepositoryInterface::class => DivisiRepository::class,
            UserRepositoryInterface::class => UserRepository::class,
            JobRepositoryInterface::class => JobRepository::class,
            CourseRepositoryInterface::class => CourseRepository::class,
            MaterialRepositoryInterface::class => MaterialRepository::class,
            QuizRepositoryInterface::class => QuizRepository::class,
            QuizAttemptRepositoryInterface::class => QuizAttemptRepository::class,
            QuizAttemptAnswerRepositoryInterface::class => QuizAttemptAnswerRepository::class,
            QuestionRepositoryInterface::class => QuestionRepository::class,
            AnswerRepositoryInterface::class => AnswerRepository::class,
        ];

        foreach ($bindings as $interface => $value) {
            $this->app->bind($interface, $value);
        }
    }

    /**
     * Bootstrap any application services.
     */
    public function boot(): void
    {
        //
    }
}
