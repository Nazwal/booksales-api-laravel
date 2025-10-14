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
        ]);
        Book::create([
            'title'=>'bumi',
            'description'=>'buku ini tentang novel fantasy dibuat oleh tereliye',
            'price'=>'40000',
            'stock'=>'22',
           
        ]);
        Book::create([
            'title'=>'seni bersikap bodo amat',
            'description'=>'buku ini menjelaskan tentang seni bodo amat',
            'price'=>'30000',
            'stock'=>'13',
           
        ]);
        Book::create([
            'title'=>'naruto',
            'description'=>'buku ini mengambarkan tentang anime dari jepang yang menjadi ninja',
            'price'=>'32000',
            'stock'=>'31',
            
        ]);
        Book::create([
            'title'=>'upin ipin',
            'description'=>'buku ini mengambarkan tentang kartun anak kembar',
            'price'=>'15000',
            'stock'=>'21',
            
        ]);

    }
}
