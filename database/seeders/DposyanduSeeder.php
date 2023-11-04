<?php

namespace Database\Seeders;

use App\Models\Dposyandu;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class DposyanduSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Dposyandu::factory()->count(50)->create();

    }
}
