<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Genre extends Model
{
    use HasFactory;

    protected $table = 'genres';
    protected $fillable = [
        'name'
    ];

    public function films(){
        return $this->belongsToMany(Film::class, 'films_by_genre', 'genre_id', 'film_id');
    }

}
