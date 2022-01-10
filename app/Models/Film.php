<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Film extends Model
{
    use HasFactory;
    protected $table = 'films';
    protected $fillable = [
        'name',
        'description',
        'overview',
        'avatar',
        'country_id',
        'world_premiere',
        'budget',
        'fees_in_world'
    ];

    public function country(){
        return $this->belongsTo(Country::class);
    }

    public function genres(){
        return $this->belongsToMany(Genre::class, 'films_by_genre', 'film_id', 'genre_id');
    }

    public function listCategories(){
        return $this->belongsToMany(ListCategory::class,'film_listings', 'list_category_id', 'film_id');
    }
}
