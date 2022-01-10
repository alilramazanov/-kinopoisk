<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class FilmByGenre extends Model
{
    use HasFactory;

    protected $table = 'films_by_genre';
    protected $fillable = [
      'film_id',
      'genre_id'
    ];
}
