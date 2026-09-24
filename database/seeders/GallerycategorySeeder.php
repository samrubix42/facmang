<?php

namespace Database\Seeders;

use App\Models\Gallerycategory;
use Illuminate\Database\Seeder;

class GallerycategorySeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $categories = [
            ['name' => 'Cleaning & Sweeping', 'slug' => 'cleaning', 'is_active' => true],
            ['name' => 'Restroom Hygiene', 'slug' => 'restrooms', 'is_active' => true],
            ['name' => 'Pantry & Staffing', 'slug' => 'pantry', 'is_active' => true],
            ['name' => 'MEP & HVAC', 'slug' => 'mep', 'is_active' => true],
            ['name' => 'Facades', 'slug' => 'facades', 'is_active' => true],
        ];

        foreach ($categories as $data) {
            Gallerycategory::updateOrCreate(
                ['slug' => $data['slug']],
                $data
            );
        }
    }
}
