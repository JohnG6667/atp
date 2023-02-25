<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Fact>
 */
class FactFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition()
    {
        return [
            'name' => $this->faker->unique()->sentence(),
            'logo' => $this->faker->randomElement(['chatbubble','camera','briefcase-outline']),
            'number' => $this->faker->randomElement([10,20,30,40,50,60,70,80,90,100]),

        ];
    }
}
