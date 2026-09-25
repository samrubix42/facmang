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
        $clientsPath = public_path('clients');

        if (! File::isDirectory($clientsPath)) {
            return;
        }

        $files = File::files($clientsPath);

        // Sort files by filename naturally
        usort($files, fn ($a, $b) => strnatcasecmp($a->getFilename(), $b->getFilename()));

        $index = 1;
        foreach ($files as $file) {
            $filename = $file->getFilename();
            $relativePath = 'clients/'.$filename;

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
