<?php

namespace Database\Seeders;

use App\Models\Danak;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class DanakSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Danak::factory()->count(80)->create();

    }
}
