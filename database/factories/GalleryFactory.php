<?php

namespace Database\Factories;

use App\Models\Gallery;
use App\Models\Gallerycategory;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends Factory<Gallery>
 */
class GalleryFactory extends Factory
{
    /**
     * @var class-string<Gallery>
     */
    protected $model = Gallery::class;

    /**
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        $images = collect([
            'hero_facility.jpg',
            'office_sweeping_cleaning.jpg',
            'restroom_hygiene_sanitation.jpg',
            'office_boy_pantry_service.jpg',
            'mep_hvac_maintenance.jpg',
            'commercial_tower.jpg',
            'estate_development.jpg',
        ]);

        return [
            'gallerycategory_id' => Gallerycategory::inRandomOrder()->value('id') ?? 1,
            'title' => ucwords($this->faker->words(3, true)),
            'image' => 'images/'.$images->random(),
            'is_active' => $this->faker->boolean(85),
        ];
    }
}
