<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Dantrian>
 */
class DantrianFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'n_antrian' => $this->faker->name(),
            't_posyandu' => 'Posyandu ' . sprintf('%02d', $this->faker->numberBetween(1, 10)),
        ];
    }
}
