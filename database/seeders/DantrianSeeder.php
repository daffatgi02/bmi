<?php

namespace Database\Seeders;

use App\Models\Dantrian;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class DantrianSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Dantrian::factory()->count(200)->create();

    }
}
