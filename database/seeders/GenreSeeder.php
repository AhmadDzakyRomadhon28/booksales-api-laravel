<?php

namespace Database\Seeders;

use App\Models\Genre;
use Illuminate\Database\Seeder;

class GenreSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $genres = [
            ['name' => 'Fiksi', 'description' => 'Karya rekaan imajinasi penulis.'],
            ['name' => 'Non-Fiksi', 'description' => 'Karya berdasar kenyataan dan fakta.'],
            ['name' => 'Pengembangan Diri', 'description' => 'Buku meningkatkan potensi diri.'],
            ['name' => 'Misteri', 'description' => 'Buku cerita pemecahan teka-teki.'],
            ['name' => 'Sains', 'description' => 'Buku pengetahuan ilmu pengetahuan.']
        ];

        foreach ($genres as $genre) {
            Genre::create($genre);
        }
    }
}