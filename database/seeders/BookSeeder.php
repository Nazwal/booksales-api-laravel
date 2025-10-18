<?php

namespace Database\Seeders;

use App\Models\Book;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class BookSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Book::create([
            'title'=>'marmut merah jambu',
            'description'=>'buku ini mengambarkan tentang murid sma dan percintaannya',
            'price'=>'35000',
            'stock'=>'33',
            'cover_photo'=>'marmut.jpg',
            'genre_id'=>1,
            'author_id'=>1,
        ]);
        Book::create([
            'title'=>'bumi',
            'description'=>'buku ini tentang novel fantasy dibuat oleh tereliye',
            'price'=>'40000',
            'stock'=>'22',
            'cover_photo'=>'bumi.jpg',
            'genre_id'=>2,
            'author_id'=>2,
        ]);
        Book::create([
            'title'=>'seni bersikap bodo amat',
            'description'=>'buku ini menjelaskan tentang seni bodo amat',
            'price'=>'30000',
            'stock'=>'13',
            'cover_photo'=>'seni.jpg',
            'genre_id'=>3,
            'author_id'=>3,
        ]);
        Book::create([
            'title'=>'naruto',
            'description'=>'buku ini mengambarkan tentang anime dari jepang yang menjadi ninja',
            'price'=>'32000',
            'stock'=>'31',
            'cover_photo'=>'naruto.jpg',
            'genre_id'=>4,
            'author_id'=>4,
        ]);
        Book::create([
            'title'=>'upin ipin',
            'description'=>'buku ini mengambarkan tentang kartun anak kembar',
            'price'=>'15000',
            'stock'=>'21',
            'cover_photo'=>'upinipin.jpg',
            'genre_id'=>5,
            'author_id'=>5,
        ]);
    }
}
