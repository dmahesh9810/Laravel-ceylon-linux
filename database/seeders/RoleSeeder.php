<?php

namespace Database\Seeders;

use App\Models\Role;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class RoleSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Role::query()->insert([
            ['name' => \App\Models\Role::ROLE_ADMIN, 'guard_name' => 'web'],
            ['name' => \App\Models\Role::ROLE_DISTRIBUTOR, 'guard_name' => 'web'],
        ]);
    }
}
