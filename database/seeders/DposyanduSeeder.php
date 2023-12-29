<?php

namespace Database\Seeders;

use App\Models\Dposyandu;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class DposyanduSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('dposyandus')->insert([
            [
                'nama_posyandu' => 'Posyandu 01',
                'lokasi_posyandu' => 'Lokasi 01',
                'pkm' => 'Sooko',
                'kel' => 'Japan',
                'rt' => '01',
                'rw' => '01',
            ],
            [
                'nama_posyandu' => 'Posyandu 02',
                'lokasi_posyandu' => 'Lokasi 02',
                'pkm' => 'Sooko',
                'kel' => 'Japan',
                'rt' => '02',
                'rw' => '02',
            ],
            [
                'nama_posyandu' => 'Posyandu 03',
                'lokasi_posyandu' => 'Lokasi 03',
                'pkm' => 'Sooko',
                'kel' => 'Japan',
                'rt' => '03',
                'rw' => '03',
            ],
            [
                'nama_posyandu' => 'Posyandu 04',
                'lokasi_posyandu' => 'Lokasi 04',
                'pkm' => 'Sooko',
                'kel' => 'Japan',
                'rt' => '04',
                'rw' => '04',
            ],
            [
                'nama_posyandu' => 'Posyandu 05',
                'lokasi_posyandu' => 'Lokasi 05',
                'pkm' => 'Sooko',
                'kel' => 'Japan',
                'rt' => '05',
                'rw' => '05',
            ],
            [
                'nama_posyandu' => 'Posyandu 06',
                'lokasi_posyandu' => 'Lokasi 06',
                'pkm' => 'Sooko',
                'kel' => 'Japan',
                'rt' => '06',
                'rw' => '06',
            ],
            [
                'nama_posyandu' => 'Posyandu 07',
                'lokasi_posyandu' => 'Lokasi 07',
                'pkm' => 'Sooko',
                'kel' => 'Japan',
                'rt' => '07',
                'rw' => '07',
            ],
            [
                'nama_posyandu' => 'Posyandu 08',
                'lokasi_posyandu' => 'Lokasi 08',
                'pkm' => 'Sooko',
                'kel' => 'Japan',
                'rt' => '08',
                'rw' => '08',
            ],
            [
                'nama_posyandu' => 'Posyandu 09',
                'lokasi_posyandu' => 'Lokasi 09',
                'pkm' => 'Sooko',
                'kel' => 'Japan',
                'rt' => '09',
                'rw' => '09',
            ],
            [
                'nama_posyandu' => 'Posyandu 10',
                'lokasi_posyandu' => 'Lokasi 10',
                'pkm' => 'Sooko',
                'kel' => 'Japan',
                'rt' => '10',
                'rw' => '10',
            ],
        ]);

    }
}
