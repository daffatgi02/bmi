<?php

namespace Database\Factories;

use App\Models\Danak;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Model>
 */
class DbulanFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        $danak = Danak::factory()->create();
        return [
            'danaks_id' => $danak->id,
            'umur_periksa' => $this->faker->numberBetween(1, 10),
            'bb_anak' => $this->faker->numberBetween(10, 15),
            'tb_anak' => $this->faker->numberBetween(80, 120),
            'lk_anak' => $this->faker->numberBetween(30, 50),
            'll_anak' => $this->faker->numberBetween(10, 15),
            'st_anak' => $this->faker->randomElement(['Gizi Baik', 'Gizi Buruk']),
            'created_at' => $this->faker->dateTimeBetween('2023-01-01', 'now'),
        ];
    }
}
