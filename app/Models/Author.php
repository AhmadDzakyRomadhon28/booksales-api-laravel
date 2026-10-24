<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Author extends Model
{
    private $authors = [
        [
            'id' => 1,
            'name' => 'Tere Liye',
            'photo' => 'tere_liye.jpg',
            'bio' => 'Penulis novel populer Indonesia dengan puluhan karya bestseller.'
        ],
        [
            'id' => 2,
            'name' => 'Mark Manson',
            'photo' => 'mark_manson.jpg',
            'bio' => 'Penulis dan blogger asal Amerika yang membahas filosofi hidup modern.'
        ],
        [
            'id' => 3,
            'name' => 'Andrea Hirata',
            'photo' => 'andrea_hirata.jpg',
            'bio' => 'Penulis Indonesia terkenal lewat novel fenomenal Laskar Pelangi.'
        ],
        [
            'id' => 4,
            'name' => 'Dee Lestari',
            'photo' => 'dee_lestari.jpg',
            'bio' => 'Penulis novel seri Supernova dan berbagai karya sastra fiksi populer.'
        ],
        [
            'id' => 5,
            'name' => 'Pramoedya Ananta Toer',
            'photo' => 'pramoedya.jpg',
            'bio' => 'Sastrawan legendaris Indonesia dengan karya yang diakui secara internasional.'
        ]
    ];

    public function getAuthors()
    {
        return $this->authors;
    }
}