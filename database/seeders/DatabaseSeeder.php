<?php

namespace Database\Seeders;


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
          DposyanduSeeder::class,
          DanakSeeder::class,
          DantrianSeeder::class,
        //   DbulanSeeder::class,
        ]);
    }
}
