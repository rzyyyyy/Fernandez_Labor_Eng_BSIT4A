<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\User;
use Illuminate\Support\Facades\Hash;
use Spatie\Permission\Models\Role;


class AdminSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $adminRole = Role::firstOrCreate(
            ['name' => 'admin', 'guard_name' => 'web']
        );

        $userRole = Role::firstOrCreate(
            ['name' => 'user', 'guard_name' => 'web']
        );


        $admin = User::firstOrCreate(
            ['email' => 'admin@example.com'],
            ['name' => 'admin', 'password' => Hash::make('password')]
        );

        if (!$admin->hasRole('admin')){
            $admin->assignRole($adminRole);
        }
    }
}
