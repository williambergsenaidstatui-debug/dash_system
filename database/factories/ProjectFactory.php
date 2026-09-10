<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

class ProjectFactory extends Factory
{
    public function definition(): array
    {
        return [
            'name' => fake()->sentence(3),
            'category' => fake()->words(2, true),
            'client' => fake()->company(),
            'delivery' => fake()->sentence(),
            'description' => fake()->paragraph(),
            'link' => fake()->url(),
            'technologies' => ['Laravel', 'JavaScript'],
            'images' => [],
            'status' => 'draft',
            'sort_order' => 0,
        ];
    }

    public function published(): static
    {
        return $this->state(fn () => ['status' => 'published']);
    }
}
