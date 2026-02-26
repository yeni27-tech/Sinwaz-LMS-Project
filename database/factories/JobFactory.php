<?php

namespace Database\Factories;

use App\Models\User;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Job>
 */
class JobFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'name' => fake() -> jobTitle(),
            'description' => fake() -> paragraphs(),
            'type' => 'fulltime',
            'location' => fake() -> locale(),
            'education' => fake() -> text('education'),
            'experience' => fake() -> text('3-5 Tahun'),
            'job_maker_id' => User::inRandomOrder()->first()->id,
        ];
    }

    public function unverified(): static
    {
        return $this->state(fn (array $attributes) => [
            'job_maker' => null,
        ]);
    }
}
