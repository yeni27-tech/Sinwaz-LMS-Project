<?php

namespace Database\Seeders;

use App\Models\QuizAttempt;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class QuizAttemptSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        QuizAttempt::factory()->count(30)->create();
    }
}
