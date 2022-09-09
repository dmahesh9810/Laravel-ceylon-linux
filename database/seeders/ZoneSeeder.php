<?php

namespace Database\Seeders;

use App\Models\zone;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class ZoneSeeder extends Seeder
{
    public function run()
    {
        zone::factory(1)->create();
    }
}