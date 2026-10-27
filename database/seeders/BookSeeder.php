<?php

namespace Database\Seeders;

use App\Models\Book;
use Illuminate\Database\Seeder;

class BookSeeder extends Seeder
{
    public function run(): void
    {
        $books = [
            ['title' => 'Bumi', 'description' => 'Petualangan 3 sahabat di dunia paralel.', 'price' => 95000, 'stock' => 20, 'cover_photo' => 'bumi.jpg', 'genre_id' => 1, 'author_id' => 1],
            ['title' => 'Sebuah Seni untuk Bersikap Bodo Amat', 'description' => 'Pendekatan waras menjalani hidup.', 'price' => 88000, 'stock' => 15, 'cover_photo' => 'bodo_amat.jpg', 'genre_id' => 1, 'author_id' => 2],
            ['title' => 'Laskar Pelangi', 'description' => 'Kisah perjuangan 10 anak di Belitung.', 'price' => 85000, 'stock' => 10, 'cover_photo' => 'laskar_pelangi.jpg', 'genre_id' => 1, 'author_id' => 3],
            ['title' => 'Supernova', 'description' => 'Novel fiksi sains dan sains populer.', 'price' => 90000, 'stock' => 12, 'cover_photo' => 'supernova.jpg', 'genre_id' => 1, 'author_id' => 4],
            ['title' => 'Bumi Manusia', 'description' => 'Kisah pergerakan nasional awal abad 20.', 'price' => 125000, 'stock' => 8, 'cover_photo' => 'bumi_manusia.jpg', 'genre_id' => 1, 'author_id' => 5]
        ];

        foreach ($books as $book) {
            Book::create($book);
        }
    }
}