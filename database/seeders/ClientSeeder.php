<?php

namespace Database\Seeders;

use App\Models\Client;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\File;

class ClientSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $clientsPath = public_path('images/clients');

        if (! File::isDirectory($clientsPath)) {
            return;
        }

        $files = array_filter(
            File::files($clientsPath),
            fn ($file) => in_array(strtolower($file->getExtension()), ['jpg', 'jpeg', 'png', 'svg', 'webp', 'gif'])
        );

        // Sort files by filename naturally
        usort($files, fn ($a, $b) => strnatcasecmp($a->getFilename(), $b->getFilename()));

        $index = 1;
        foreach ($files as $file) {
            $filename = $file->getFilename();
            $relativePath = 'images/clients/'.$filename;

            // Clean title based on filename
            $baseName = pathinfo($filename, PATHINFO_FILENAME);
            $cleanName = preg_replace('/-150x150$/', '', $baseName);
            $cleanName = preg_replace('/-1$/', '', $cleanName);
            $title = 'Partner '.strtoupper(str_replace(['_', '-'], ' ', $cleanName));

            Client::updateOrCreate(
                ['image' => $relativePath],
                [
                    'title' => $title,
                    'is_active' => true,
                    'sort_order' => $index,
                ]
            );

            $index++;
        }
    }
}
