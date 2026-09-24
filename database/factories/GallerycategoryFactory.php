<?php

namespace Database\Factories;

use App\Models\Gallerycategory;
use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Str;

/**
 * @extends Factory<Gallerycategory>
 */
class GallerycategoryFactory extends Factory
{
    /**
     * @var class-string<Gallerycategory>
     */
    protected $model = Gallerycategory::class;

    /**
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        $name = ucfirst($this->faker->word()).' Care';

        return [
            'name' => $name,
            'slug' => Str::slug($name).'-'.$this->faker->unique()->numberBetween(1, 9999),
            'is_active' => $this->faker->boolean(85),
        ];
    }
}
