<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Team>
 */
class TeamFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition()
    {
        return [
            'name' => $this->faker->name(),
            'position'=>$this->faker->unique()->sentence(),
            'facebook'=>$this->faker->word(50),
            'google'=>$this->faker->word(50),
            'instagram'=>$this->faker->word(50),
        ];
    }
}
