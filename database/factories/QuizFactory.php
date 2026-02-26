<?php

namespace Database\Factories;

use App\Models\Divisi;
use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Str;

use function Livewire\str;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Quiz>
 */
class QuizFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'name' => fake() -> name(),
            'description' => Str::random(10),
            'divisi_id' => Divisi::inRandomOrder()->first()->id,
            'duration' => 60,
        ];
    }

    public function unverified(): static
    {
        return $this->state(fn (array $attributes) => [
            'divisi_id' => null,
        ]);
    }
}
