<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Casta>
 */
class CastaFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */

    public $test = 1;
    public function definition(): array
    {
        return [
            'title' => $this->faker->jobTitle(1),
        ];
    }
}
