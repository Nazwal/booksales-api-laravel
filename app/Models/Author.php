<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Author extends Model
{
    private $authors = [
        [
           'penulis' => 'radit'
        ],
        [
           'penulis' => 'panji'
        ],
        [
           'penulis' => 'ernest'
        ],
        [
           'penulis' => 'thereliye'
        ],
        [
           'penulis' => 'dimas'
        ],
       
      ];
      public function getAuthors(){
        return $this->authors;
      }
}
