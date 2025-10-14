<?php

namespace Database\Seeders;

use App\Models\Author;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class AuthorSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Author::create([
            'nama'=>'raditya dika',
        ]);
        Author::create([
            'nama'=>'thereliye',
        ]);
        Author::create([
            'nama'=>'pandji',
        ]);
        Author::create([
            'nama'=>'dimas',
        ]);
        Author::create([
            'nama'=>'raka',
        ]);
    }
}
