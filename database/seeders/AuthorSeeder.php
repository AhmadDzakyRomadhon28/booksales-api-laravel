<?php

namespace Database\Seeders;

use App\Models\Author;
use Illuminate\Database\Seeder;

class AuthorSeeder extends Seeder
{
    public function run(): void
    {
        $authors = [
            ['name' => 'Tere Liye', 'photo' => 'tere_liye.jpg', 'bio' => 'Penulis novel populer Indonesia.'],
            ['name' => 'Mark Manson', 'photo' => 'mark_manson.jpg', 'bio' => 'Penulis filosofi hidup modern.'],
            ['name' => 'Andrea Hirata', 'photo' => 'andrea_hirata.jpg', 'bio' => 'Penulis novel Laskar Pelangi.'],
            ['name' => 'Dee Lestari', 'photo' => 'dee_lestari.jpg', 'bio' => 'Penulis novel seri Supernova.'],
            ['name' => 'Pramoedya Ananta Toer', 'photo' => 'pramoedya.jpg', 'bio' => 'Sastrawan legendaris Indonesia.']
        ];

        foreach ($authors as $author) {
            Author::create($author);
        }
    }
}