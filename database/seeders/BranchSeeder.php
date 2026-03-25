<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Branch;

class BranchSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $branches = [
            [
                'name' => 'AFG MAD',
                'address' => 'C/ ALMANAQUE Nº 5',
            ],
            [
                'name' => 'SAS',
                'address' => 'Rambla Catalunya 19-21',
            ],
            [
                'name' => 'AFG BCN',
                'address' => null,
            ],
        ];

        foreach ($branches as $branch) {
            Branch::updateOrCreate(
                ['name' => $branch['name']],
                ['address' => $branch['address']]
            );
        }
    }
}
