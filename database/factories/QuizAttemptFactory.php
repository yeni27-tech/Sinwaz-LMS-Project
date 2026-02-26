<?php

namespace Database\Factories;

use App\Models\Quiz;
use App\Models\User;
use Carbon\Carbon;
use Illuminate\Database\Eloquent\Factories\Factory;
use Ramsey\Uuid\Type\Integer;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\QuizAttempt>
 */
class QuizAttemptFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'quiz_id' => Quiz::inRandomOrder()->first()->id,
            'user_id' => User::inRandomOrder()->first()->id,
            'score' => $this ->faker->numberBetween(1,100),
            'status' => $this -> faker -> randomElement([
                'done',
                // 'in_progress'
            ]),
            'submitted_at' => Carbon::now(),
        ];
    }
}
