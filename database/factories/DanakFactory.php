<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Danak>
 */
class DanakFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'nama_anak' => $this->faker->name(),
            'tempat_lahir' => $this->faker->city(),
            'tanggal_lahir' => $this->faker->date(),
            'umur' => $this->faker->numberBetween(1, 10),
            'jk' => $this->generateGender(),
            't_posyandu' => $this->faker->company('hospital'), // Generates a random company name
        ];
    }

    public function generateGender()
    {
        // Generate a random gender based on the name
        $namaAnak = $this->faker->name();
        $gender = $this->faker->randomElement(['L', 'P']); // Assuming 'L' is male and 'P' is female
        // You can implement a more sophisticated logic to determine gender based on the name if needed.
        return $gender;
    }
}
