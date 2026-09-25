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
            'company_name' => 'FacilityPro Management Inc.',
            'email' => 'ops@facilitypro.com',
            'phone' => '+1 (800) 492-8820',
            'whatsapp' => '+1 (800) 492-8820',
            'address' => '100 Enterprise Plaza, Suite 400, Financial District',
            'google_map_link' => 'https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3151.83543450937!2d144.95373631531825!3d-37.81627977975171!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x6ad65d4c2b349649%3A0xb6899234e561db11!2sEnvato!5e0!3m2!1sen!2s!4v1625000000000!5m2!1sen!2s',
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
