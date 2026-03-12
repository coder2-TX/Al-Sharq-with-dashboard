<?php

namespace Database\Seeders;

use App\Models\PartnerLogo;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\Storage;

class PartnerLogoSeeder extends Seeder
{
    public function run(): void
    {
        if (PartnerLogo::query()->exists()) {
            return;
        }

        $sourcePath = public_path('assets/images/parteners');

        if (! File::isDirectory($sourcePath)) {
            return;
        }

        $files = File::files($sourcePath);

        usort($files, function ($a, $b) {
            return strnatcasecmp($a->getFilename(), $b->getFilename());
        });

        $allowedExtensions = ['jpg', 'jpeg', 'png', 'svg', 'webp', 'gif', 'avif'];

        foreach ($files as $index => $file) {
            $extension = strtolower($file->getExtension());

            if (! in_array($extension, $allowedExtensions, true)) {
                continue;
            }

            $targetPath = 'site/partners/' . $file->getFilename();

            if (! Storage::disk('public')->exists($targetPath)) {
                Storage::disk('public')->put($targetPath, File::get($file->getPathname()));
            }

            PartnerLogo::create([
                'image_path' => $targetPath,
                'sort_order' => $index + 1,
            ]);
        }
    }
}