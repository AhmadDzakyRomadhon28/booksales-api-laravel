<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Genre extends Model
{
    private $genres = [
        [
            'id' => 1,
            'name' => 'Fiksi',
            'description' => 'Karya sastra rekaan yang berasal dari imajinasi penulis.'
        ],
        [
            'id' => 2,
            'name' => 'Non-Fiksi',
            'description' => 'Karya sastra yang didasarkan pada fakta dan kenyataan.'
        ],
        [
            'id' => 3,
            'name' => 'Pengembangan Diri',
            'description' => 'Buku petunjuk untuk meningkatkan kualitas hidup dan potensi diri.'
        ],
        [
            'id' => 4,
            'name' => 'Misteri',
            'description' => 'Buku dengan alur cerita berfokus pada penyelesaian teka-teki.'
        ],
        [
            'id' => 5,
            'name' => 'Sains & Teknologi',
            'description' => 'Buku yang membahas pengetahuan ilmiah dan perkembangan teknologi.'
        ]
    ];

    public function getGenres()
    {
        return $this->genres;
    }
}