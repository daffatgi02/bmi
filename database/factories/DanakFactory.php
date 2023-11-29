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

        $nikAnak = $this->generateNIK(); // Generate NIK
        $nowa = $this->generateNoWa(); // Generate NoWa

        return [
            'nama_anak' => $this->faker->name(),
            'tempat_lahir' => $this->faker->city(),
            'tanggal_lahir' => $randomBirthDate->format('Y-m-d'), // Format tanggal lahir
            // 'umur' => $umurText, // Umur dalam bulan atau tahun
            'jk' => $this->generateGender(),
            't_posyandu' => 'Posyandu ' . sprintf('%02d', $this->faker->numberBetween(1, 10)),
            'nik_anak' => $nikAnak, // Assign NIK
            'nowa' => $nowa, // Assign NoWa
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
    public function generateNIK()
    {
        // Generate a random NIK (Nomor Induk Kependudukan) format used in Indonesia
        $provinceCode = '32'; // Assuming the province code is '32'
        $randomNumbers = str_pad((string)mt_rand(1, 99999999999999), 14, '0', STR_PAD_LEFT); // Generating a 14-digit number
        $randomNIK = $provinceCode . $randomNumbers;
        return $randomNIK;
    }

    public function generateNoWa()
    {
        // Generate a random NoWa (Nomor WhatsApp)
        $prefix = '08'; // Assuming the number starts with '08' as per Indonesian mobile number format
        $randomNumbers = str_pad((string)mt_rand(1, 999999999), 9, '0', STR_PAD_LEFT); // Generating a 9-digit number
        $randomNoWa = $prefix . $randomNumbers;
        return $randomNoWa;
    }
}
