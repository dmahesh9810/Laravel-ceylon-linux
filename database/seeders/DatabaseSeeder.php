<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        // \App\Models\User::factory(10)->create();

        $this->call(RoleSeeder::class);
        $this->call(ZoneSeeder::class);
        $this->call(RegionSeeder::class);
        $this->call(TerritorySeeder::class);
        $this->call(UserSeeder::class);
        $this->call(SkuSeeder::class);
        $this->call(OrderSeeder::class);
    }
}