<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Role;

class RoleSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $roles = [
            Role::ROLE_ADMIN,
            Role::ROLE_INSTRUCTOR,
            Role::ROLE_STUDENT,
        ];

        foreach ($roles as $roleName) {
            Role::updateOrCreate(['name' => $roleName]);
        }
    }
}
