<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('users')->insert([
            [
                'level' => 'admin',
                'name' => 'Admin',
                'nik' => '3504072807020033',
                'status' => 'Aktif',
                'email' => 'a@a',
                'password' => bcrypt('qawsedrf'),
            ],
            [
                'level' => 'bidan',
                'name' => 'bidan',
                'nik' => '3504072807020011',
                'status' => 'Aktif',
                'email' => 'b@b',
                'password' => bcrypt('qawsedrf'),
            ],
            [
                'level' => 'kader',
                'name' => 'Kader',
                'nik' => '3504072807020022',
                'status' => 'Aktif',
                'email' => 'k@k',
                'password' => bcrypt('qawsedrf'),
            ],
            [
                'level' => 'kader',
                'name' => 'Rendy',
                'nik' => '3504072807020002',
                'status' => 'Belum Aktif',
                'email' => 'r@r',
                'password' => bcrypt('qawsedrf'),
            ],
        ]);
    }
}
