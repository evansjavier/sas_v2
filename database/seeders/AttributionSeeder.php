<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Attribution;

class AttributionSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $attributions = [
            'SFI320',
            'TRI330',
            'SFI330',
            'TRI320',
            'TRE320',
            'TRE330',
            'CRI',
            'CRE',
            'IRI',
            'IRE',
            'FI',
            'FE'
        ];

        foreach ($attributions as $attribution) {
            Attribution::updateOrCreate(
                ['name' => $attribution]
            );
        }
    }
}
