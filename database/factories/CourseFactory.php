<?php

namespace Database\Factories;

use App\Models\Divisi;
use App\Models\User;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Course>
 */
class CourseFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'name' => $this->faker -> name,
            'description' => $this -> faker -> paragraph,
            'divisi_id' => Divisi::inRandomOrder()->first()->id,
            'tutor_id' => User::inRandomOrder()->first()->id,
        ];
    }

    public function unverified(): static
    {
        return $this->state(fn (array $attributes) => [
            'divisi_id' => null,
            'tutor_id' => null,
        ]);
    }
}
