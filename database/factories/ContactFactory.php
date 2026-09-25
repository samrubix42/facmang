<?php

namespace Database\Factories;

use App\Models\Contact;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends Factory<Contact>
 */
class ContactFactory extends Factory
{
    protected $model = Contact::class;

    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'name' => fake()->name(),
            'email' => fake()->safeEmail(),
            'phone' => fake()->phoneNumber(),
            'property_type' => fake()->randomElement(['Corporate Office Tower', 'Tech Innovation Campus', 'Healthcare / Medical Facility', 'Commercial Mall / Retail Hub', 'Industrial / Warehouse Center']),
            'subject' => 'SLA Proposal Request',
            'message' => fake()->paragraph(),
            'is_read' => fake()->boolean(30),
        ];
    }
}
