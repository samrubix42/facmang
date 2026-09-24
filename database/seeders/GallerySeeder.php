<?php

namespace Database\Seeders;

use App\Models\Gallery;
use App\Models\Gallerycategory;
use Illuminate\Database\Seeder;

class GallerySeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $items = [
            ['image' => 'images/hero_facility.jpg', 'title' => 'Facility Operations Command', 'category' => 'cleaning'],
            ['image' => 'images/office_sweeping_cleaning.jpg', 'title' => 'Executive Sweeping Protocol', 'category' => 'cleaning'],
            ['image' => 'images/restroom_hygiene_sanitation.jpg', 'title' => 'Restroom Micro-Sanitization', 'category' => 'restrooms'],
            ['image' => 'images/office_boy_pantry_service.jpg', 'title' => 'Pantry Steward Service', 'category' => 'pantry'],
            ['image' => 'images/mep_hvac_maintenance.jpg', 'title' => 'HVAC Filter Cycle Audit', 'category' => 'mep'],
            ['image' => 'images/commercial_tower.jpg', 'title' => 'High-Rise Facade Care', 'category' => 'facades'],
            ['image' => 'images/estate_development.jpg', 'title' => 'Campus Estate Sweeping', 'category' => 'cleaning'],
        ];

        foreach ($items as $data) {
            $category = Gallerycategory::firstOrCreate(
                ['slug' => $data['category']],
                ['name' => ucwords(str_replace('-', ' ', $data['category'])), 'is_active' => true]
            );

            Gallery::updateOrCreate(
                ['title' => $data['title']],
                [
                    'gallerycategory_id' => $category->id,
                    'image' => $data['image'],
                    'is_active' => true,
                ]
            );
        }
    }
}
