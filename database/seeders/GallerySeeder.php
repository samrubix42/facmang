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
        // Delete all old gallery records
        Gallery::query()->delete();

        $items = [
            ['image' => 'images/gallery/PIC_4897.webp', 'title' => 'RFS Staff Assembly & Inspection', 'category' => 'team-operations'],
            ['image' => 'images/gallery/PIC_4905.webp', 'title' => 'On-Site Facility Team Lineup', 'category' => 'team-operations'],
            ['image' => 'images/gallery/PIC_4914.webp', 'title' => 'Uniformed Housekeeping Team', 'category' => 'housekeeping-staffing'],
            ['image' => 'images/gallery/PIC_4918.webp', 'title' => 'Facility Management Staff Formation', 'category' => 'team-operations'],
            ['image' => 'images/gallery/PIC_4920.webp', 'title' => 'RFS Operations Team Briefing', 'category' => 'on-site-inspection'],
            ['image' => 'images/gallery/PIC_4921.webp', 'title' => 'On-Site Supervisor & Staff Assembly', 'category' => 'on-site-inspection'],
            ['image' => 'images/gallery/PIC_4923.webp', 'title' => 'Facility Service Staff Lineup', 'category' => 'housekeeping-staffing'],
            ['image' => 'images/gallery/PIC_4924.webp', 'title' => 'Dedicated Housekeeping Crew', 'category' => 'housekeeping-staffing'],
            ['image' => 'images/gallery/PIC_4926.webp', 'title' => 'On-Site Team Pledge & Inspection', 'category' => 'on-site-inspection'],
            ['image' => 'images/gallery/PIC_4928.webp', 'title' => 'RFS Facility Management Team', 'category' => 'team-operations'],
        ];

        foreach ($items as $data) {
            $category = Gallerycategory::firstOrCreate(
                ['slug' => $data['category']],
                ['name' => ucwords(str_replace('-', ' ', $data['category'])), 'is_active' => true]
            );

            Gallery::create([
                'gallerycategory_id' => $category->id,
                'title' => $data['title'],
                'image' => $data['image'],
                'is_active' => true,
            ]);
        }
    }
}
