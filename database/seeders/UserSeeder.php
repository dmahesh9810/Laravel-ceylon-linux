<?php

namespace Database\Seeders;

use App\Models\Role;
use App\Models\Territory;
use App\Models\User;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        User::factory()->create([
            'name' => 'Mahesh',
            'nic' => '981620780V',
            'address' => 'Buttala',
            'mobile' => '0773132669',
            'email' => 'admin@gmail.com',
            'gender' => 'male',
            'territory_id' => null,
            'user_name' => 'mahesh456',
            'password' => Hash::make('password')
        ])->assignRole(Role::ROLE_ADMIN);

        User::factory()->create([
            'name' => 'dst',
            'nic' => '991620780V',
            'address' => 'Buttalas',
            'mobile' => '0773132665',
            'email' => 'dst@gmail.com',
            'gender' => 'male',
            'territory_id' => Territory::query()->inRandomOrder()->first()->id,
            'user_name' => 'dst456',
            'password' => Hash::make('password')
        ])->assignRole(Role::ROLE_DISTRIBUTOR);


        $users = User::factory(1)->create();
        foreach ($users as $user) {
            $user->assignRole(Role::ROLE_DISTRIBUTOR);
        }
    }
}