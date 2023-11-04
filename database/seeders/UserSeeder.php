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
                'level' => 'bidan',
                'name' => 'bidan',
                'email' => 'b@b',
                'password' => bcrypt('qawsedrf'),
            ],
            [
                'level' => 'kader',
                'name' => 'Kader',
                'email' => 'k@k',
                'password' => bcrypt('qawsedrf'),
            ],
        ]);
    }
}
