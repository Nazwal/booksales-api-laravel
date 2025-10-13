<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Genre extends Model
{
  private $genres = [
    [
       'genre' => 'fiksi'
    ],
    [
       'genre' => 'non fiksi'
    ],
    [
       'genre' => 'komik'
    ],
    [
       'genre' => 'novel'
    ],
    [
       'genre' => 'horor'
    ],
   
  ];
  public function getGenres(){
    return $this->genres;
  }

}
