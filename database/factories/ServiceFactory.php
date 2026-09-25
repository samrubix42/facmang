<?php

namespace Database\Factories;

use App\Models\Service;
use App\Models\ServiceCategory;
use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Str;

/**
 * @extends Factory<Service>
 */
class ServiceFactory extends Factory
{
    /**
     * @var class-string<Service>
     */
    protected $model = Service::class;

    /**
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        $title = ucfirst($this->faker->words(3, true));

        return [
            'service_category_id' => ServiceCategory::factory(),
            'title' => $title,
            'slug' => Str::slug($title).'-'.$this->faker->unique()->numberBetween(1, 9999),
            'image' => 'images/sample.jpg',
            'is_active' => $this->faker->boolean(80),
            'short_description' => $this->faker->sentence(12),
            'content' => $this->faker->paragraphs(3, true),
            'meta_title' => $title.' | FacilityPro',
            'meta_description' => $this->faker->sentence(10),
            'meta_keyword' => implode(', ', $this->faker->words(5)),
        ];
    }
}
