<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class FilmListing extends Model
{
    use HasFactory;
    use SoftDeletes;
    protected $table = 'film_listings';
    protected $fillable = [
        'film_id',
        'list_category_id'
    ];

}
