<?php

namespace Database\Seeders;

use App\Models\Setting;
use Illuminate\Database\Seeder;

class SettingSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $settings = [
            'company_name' => 'Real Facility Services (RFS)',
            'email' => 'info@realfacilityservices.com',
            'phone' => '+91 88005-93143',
            'whatsapp' => '+91 88005-93143',
            'address' => 'Office No. 2, First Floor, Plot No. 128, New Haibatpur, Near Gaur City Mall, Sector 4, Greater Noida West (U.P.) 201318',
            'google_map_link' => 'https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3502.655923218129!2d77.4276549!3d28.610097299999996!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x390ce5900b942d4f%3A0xcb8eeabb60fb701f!2sNDS%20Security%20Services%20Pvt%20Ltd!5e0!3m2!1sen!2sin!4v1790676970101!5m2!1sen!2sin',
            'office_hours' => 'Mon - Sat: 10:00 AM - 7:00 PM',
            'facebook' => 'https://facebook.com',
            'twitter' => 'https://twitter.com',
            'instagram' => 'https://instagram.com',
            'linkedin' => 'https://linkedin.com',
            'youtube' => 'https://youtube.com',
        ];

        foreach ($settings as $key => $value) {
            Setting::updateOrCreate(
                ['key' => $key],
                ['value' => $value]
            );
        }
    }
}
