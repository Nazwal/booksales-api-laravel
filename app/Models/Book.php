<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Book extends Model
{
    private $books = [
        [
            'title' => 'pulang',
            'description' => 'petualangan seorang pemuda pulang ek kampung',
            'price' => '40000',
            'stock' => '15',
            'cover_photo' => 'pulang.jpg',
            'genre_id' => '1',
            'author_id' => '1'
        ],
        [
            'title' => 'sebuah seni bersikap bodo amat',
            'description' => 'buku yang membahas kehidupan dan filosofi',
            'price' => '25000',
            'stock' => '5',
            'coer_photo' => 'sebuah.jpg',
            'genre_id' => '2',
            'author_id' => '2'
        ],
        [
            'title' => 'Naruto',
            'description' => 'buku Komik yang membahas ninja',
            'price' => '30000',
            'stock' => '55',
            'coer_photo' => 'Naruto.jpg',
            'genre_id' => '3',
            'author_id' => '3'
        ]
    ];
    public function getBooks(){
        return $this->books;
    }
}
