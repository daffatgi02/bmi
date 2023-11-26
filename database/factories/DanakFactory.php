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
        $maxYears = 10; // Umur maksimal dalam tahun
        $randomYears = $this->faker->numberBetween(1, $maxYears); // Umur antara 1 hingga 10 tahun
        $maxMonths = $maxYears * 12; // Konversi tahun ke bulan untuk batasan maksimal

        $randomMonths = $this->faker->numberBetween(1, $maxMonths); // Umur dalam bulan antara 1 hingga 120 (10 tahun)

        // Jika umur yang di-generate melebihi 10 tahun, atur kembali umur ke 10 tahun dalam bulan
        if ($randomMonths > $maxMonths) {
            $randomMonths = $maxMonths;
        }

        $umurText = ($randomMonths < 12) ? $randomMonths . " bulan" : floor($randomMonths / 12) . " tahun";

        // Tanggal lahir yang akan di-generate akan menjadi hari ini dikurangi dengan umur dalam bulan
        $randomBirthDate = $this->faker->dateTimeThisDecade('-' . $randomMonths . ' months');

        return [
            'nama_anak' => $this->faker->name(),
            'tempat_lahir' => $this->faker->city(),
            'tanggal_lahir' => $randomBirthDate->format('Y-m-d'), // Format tanggal lahir
            'umur' => $umurText, // Umur dalam bulan atau tahun
            'jk' => $this->generateGender(),
            't_posyandu' => 'Posyandu ' . sprintf('%02d', $this->faker->numberBetween(1, 10)),
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
