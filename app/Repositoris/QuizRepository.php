<?php

namespace App\Repositoris;

use App\DTO\QuizRequestDTO;
use App\Interfaces\QuizRepositoryInterface;
use App\Models\Quiz;
use App\Models\QuizAttempt;
use Carbon\Carbon;
use Illuminate\Support\Facades\Cache;
use Illuminate\Support\Facades\DB;

class QuizRepository implements QuizRepositoryInterface

{
    public function findQuizzes() {
        $quizzes = Quiz::lazy();

        return $quizzes;
    }

    public function findAllQuizzes()
    {
        return Quiz::all();
    }

    public function findTop10nQuizzes()
    {
        $topQuiz = DB::table('quizzes')
                ->leftJoin('divisis', 'quizzes.divisi_id', '=', 'divisis.id')
                ->leftJoin('quiz_attempts', 'quizzes.id', '=', 'quiz_attempts.quiz_id')
                ->leftJoin('questions', 'quizzes.id', '=', 'questions.quiz_id')
                ->select('quizzes.id', 'quizzes.name','divisis.name as divisi_name', DB::raw('COUNT(questions.id) as questions_count'), DB::raw('COUNT(quiz_attempts.id) as quiz_attempts_count'))
                ->whereBetween('quiz_attempts.submitted_at', [
                    Carbon::now()->startOfMonth(),  // Start of this month
                    Carbon::now()->endOfMonth()     // End of this month
                ])
                ->where('status', 'done')
                ->groupBy('quizzes.id')
                ->orderByDesc('quiz_attempts_count')
                ->take(10)
                ->get();

        // $topQuiz = QuizAttempt::groupBy("quiz_id")->orderBy();

        // dd($topQuiz);

        return $topQuiz;
    }

    public function findAllQuizPagination(string $search = '', int $perPage = 10) {
        return Quiz::query()
            ->when($search, function ($q) use ($search) {
                $q->where('name', 'like', "%{$search}%")
                ->orWhere('description', 'like', "%{$search}%");
            })
            ->latest()
            ->paginate($perPage);
    }

    public function findQuizById($id) {
            $quizById = Quiz::with('question.answer') -> findOrFail($id);

            return $quizById;
    }

    public function findActiveQuizzes()
    {
        return Quiz::where('is_active', true)->get();
    }

    public function createQuiz (QuizRequestDTO $request) {
            return Quiz::create([
                'divisi_id' => $request -> divisi_id,
                'name' => $request -> name,
                'description' => $request -> description,
                // 'duration' => $request -> duration,
                // 'is_active' => $request -> is_active,
            ]);
    }

    public function updateQuiz($id, QuizRequestDTO $request)
    {
            return Quiz::where('id', $id) -> update([
                'divisi_id' => $request -> divisi_id,
                'name' => $request -> name,
                'description' => $request -> description,
                // 'duration' => $request -> duration,
                // 'is_active' => $request -> is_active,
            ]);
    }

    public function findActivateQuiz($id)
    {
        return Quiz::where('id', $id) -> update([
            'is_active' => true,
        ]);
    }

    public function findNonActivateQuiz($id)
    {
        return Quiz::where('id', $id) -> update([
            'is_active' => false,
        ]);
    }

    public function removeQuiz($id) {
        return Quiz::where('id', $id)->delete();
    }
}
