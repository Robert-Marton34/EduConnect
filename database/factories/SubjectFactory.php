<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Subject>
 */
class SubjectFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            "name" => fake()->word(2, true),
            "description" => fake()->optional()->sentence(),
            "subject_code" => fake()->regexify('IK-[A-Z]{3}[0-9]{3}'),
            "credit" => fake()->numberBetween(1, 6),
        ];
    }
}
