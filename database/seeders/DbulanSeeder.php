<?php

namespace Database\Seeders;

use App\Models\Dbulan;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class DbulanSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Dbulan::factory()->count(300)->create();
    }
}
