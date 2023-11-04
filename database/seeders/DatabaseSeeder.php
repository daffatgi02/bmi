<?php

namespace Database\Seeders;

use App\Models\Dposyandu;
use Illuminate\Database\Seeder;


class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        $this->call([
          UserSeeder::class,
          DanakSeeder::class,
          DposyanduSeeder::class,
        ]);
    }
}
