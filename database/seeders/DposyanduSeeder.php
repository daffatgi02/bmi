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
            ],
            [
                'nama_posyandu' => 'Posyandu 02',
                'lokasi_posyandu' => 'Lokasi 02',
            ],
            [
                'nama_posyandu' => 'Posyandu 03',
                'lokasi_posyandu' => 'Lokasi 03',
            ],
            [
                'nama_posyandu' => 'Posyandu 04',
                'lokasi_posyandu' => 'Lokasi 04',
            ],
            [
                'nama_posyandu' => 'Posyandu 05',
                'lokasi_posyandu' => 'Lokasi 05',
            ],
            [
                'nama_posyandu' => 'Posyandu 06',
                'lokasi_posyandu' => 'Lokasi 06',
            ],
            [
                'nama_posyandu' => 'Posyandu 07',
                'lokasi_posyandu' => 'Lokasi 07',
            ],
            [
                'nama_posyandu' => 'Posyandu 08',
                'lokasi_posyandu' => 'Lokasi 08',
            ],
            [
                'nama_posyandu' => 'Posyandu 09',
                'lokasi_posyandu' => 'Lokasi 09',
            ],
            [
                'nama_posyandu' => 'Posyandu 10',
                'lokasi_posyandu' => 'Lokasi 10',
            ],
        ]);

    }
}
