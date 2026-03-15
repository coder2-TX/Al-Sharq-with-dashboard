<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ContactPageMapSection extends Model
{
    use HasFactory;

    protected $fillable = [
        'google_maps_embed_url',
    ];

    public function getGoogleMapsEmbedUrlDisplayAttribute(): string
    {
        $url = trim((string) $this->google_maps_embed_url);

        if ($url === '') {
            return 'https://www.google.com/maps?q=Sana%27a,+Yemen&z=14&output=embed';
        }

        if (str_contains($url, 'output=embed')) {
            return $url;
        }

        if (preg_match('#/maps/place/([^/@?]+)#', $url, $matches)) {
            $place = urldecode(str_replace('+', ' ', $matches[1]));

            return 'https://www.google.com/maps?q=' . urlencode($place) . '&z=14&output=embed';
        }

        if (preg_match('/[?&]q=([^&]+)/', $url, $matches)) {
            $query = urldecode($matches[1]);

            return 'https://www.google.com/maps?q=' . urlencode($query) . '&z=14&output=embed';
        }

        return 'https://www.google.com/maps?q=' . urlencode($url) . '&z=14&output=embed';
    }
}