<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\User;
use App\Models\Role;
use Illuminate\Support\Facades\Hash;

class SasUserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $admin = User::updateOrCreate(
            ['email' => 'admin@simpleaviationsolutions.com'],
            [
                'name' => 'SAS Admin',
                'password' => Hash::make('sas-admin-2026'),
                'license_number' => 'SAS-ADMIN-001',
            ]
        );

        $adminRole = Role::where('name', Role::ROLE_ADMIN)->first();
        if ($adminRole) {
            $admin->roles()->syncWithoutDetaching([$adminRole->id]);
        }
    }
}
