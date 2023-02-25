<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Work>
 */
class WorkFactory extends Factory
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
            'type' => $this->faker->name(),
            'description'=>$this->faker->text(110),
            'facebook'=>$this->faker->word(50),
            'instagram'=>$this->faker->word(50),
            'pinterest'=>$this->faker->word(50),
        ];
    }
}
