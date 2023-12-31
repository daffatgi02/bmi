<?php

namespace Database\Factories;

use App\Models\Dposyandu;
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
            'dposyandu_id' => Dposyandu::inRandomOrder()->first()->id,
            'nik_anak' => $this->generateNIK(), // Menggunakan method generateNIK yang sudah ada di factory
            'nama_anak' => $this->faker->name(),
            'tanggal_lahir' => $this->faker->dateTimeBetween('2018-01-01', '2023-12-31')->format('Y-m-d'),
            'jk' => $this->faker->randomElement(['L', 'P']),
            'nama_ortu' => $this->faker->name(),
            'nik_ortu' => $this->generateNIK(), // Menggunakan method generateNIK yang sudah ada di factory
            'hp_ortu' => $this->generateNoWa(), // Menggunakan method generateNoWa yang sudah ada di factory
            
        ];
    }


    public function generateNIK()
    {
        $provinceCode = '32'; // Kode provinsi asumsi '32'
        $randomNumbers = str_pad((string)mt_rand(1, 99999999999999), 14, '0', STR_PAD_LEFT);
        $randomNIK = $provinceCode . $randomNumbers;
        return $randomNIK;
    }

    public function generateNoWa()
    {
        $prefix = '08'; // Awalan nomor '08' sesuai format nomor HP Indonesia
        $randomNumbers = str_pad((string)mt_rand(1, 999999999), 9, '0', STR_PAD_LEFT);
        $randomNoWa = $prefix . $randomNumbers;
        return $randomNoWa;
    }
}
