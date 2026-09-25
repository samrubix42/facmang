<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    use WithoutModelEvents;

    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        User::updateOrCreate(
            ['email' => 'admin@facilitypro.com'],
            [
                'name' => 'Facility Admin',
                'password' => bcrypt('password'),
            ]
        );

        $this->call(TestimonialSeeder::class);
        $this->call(GallerycategorySeeder::class);
        $this->call(GallerySeeder::class);
        $this->call(ServiceCategorySeeder::class);
        $this->call(ServiceSeeder::class);
        $this->call(JobApplicationSeeder::class);
    }
}
