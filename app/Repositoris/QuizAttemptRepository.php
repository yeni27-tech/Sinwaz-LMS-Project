<?php

namespace App\Repositoris;

use App\DTO\QuizAttemptRequestDTO;
use App\Interfaces\QuizAttemptRepositoryInterface;
use App\Models\QuizAttempt;
use Carbon\Carbon;
use Date;
use DateTime;
use Illuminate\Support\Facades\DB;

class QuizAttemptRepository implements QuizAttemptRepositoryInterface
{
   public function findQuizAttemptById($id)
   {
        return QuizAttempt::findOrFail($id);
   }

   public function findLatestQuizAttemptByUserIdAndQuizId($userId,$quizId)
   {
        return QuizAttempt::latest() -> where("user_id", $userId)->where('quiz_id', $quizId);
   }
   public function findQuizAttempts() {
        return QuizAttempt::lazy();
   }

   public function findQuizAttemptsWithoutPagination() {
        return QuizAttempt::get();
   }

   public function findLeaderboardPerMonth()
   {
        $start = Carbon::now()->startOfMonth();
        $end   = Carbon::now()->endOfMonth();
        $leaderboard = DB::table('quiz_attempts')
        ->join('users', 'users.id', '=', 'quiz_attempts.user_id')
        ->whereBetween('quiz_attempts.submitted_at', [$start, $end])
        ->where('quiz_attempts.status', 'done')
        ->groupBy('quiz_attempts.user_id', 'users.name')
        ->select([
            'quiz_attempts.user_id',
            'users.name',
            DB::raw('SUM(quiz_attempts.score) as total_score'),
            DB::raw('COUNT(*) as attempts'),
            DB::raw('MAX(quiz_attempts.score) as best_score'),
        ])
        ->orderByDesc('total_score')
        ->orderByDesc('best_score') // tie breaker (optional)
        ->take(10)
        ->get();

        // dd($leaderboard);

        return $leaderboard;
   }

   public function findQuizAttemptsGroupByStatusInThisMonth() {
        $start = now()->startOfMonth();
        $end   = now()->endOfMonth();

        return QuizAttempt::whereBetween('created_at', [$start, $end])
            ->selectRaw('status, COUNT(*) as total')
            ->groupBy('status')
            ->get();
   }

   public function createQuizAttempt(QuizAttemptRequestDTO $data)
   {
        return QuizAttempt::create([
            "quiz_id"=> $data->quiz_id,
            "user_id"=> $data->user_id,
            "score"=> $data->score,
            "submitted_at"=> $data->submitted_at,
            "status"=> $data->status,
            'created_at' => new DateTime()
        ]);
   }

   public function submitQuizAttempt($id, $score)
   {
        return QuizAttempt::where("id", $id)->update([
            'score' => $score,
            'status' => 'done',
            'submitted_at' => new DateTime(),
        ]);
   }
}
