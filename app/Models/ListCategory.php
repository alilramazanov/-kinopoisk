<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class ListCategory extends Model
{
    use HasFactory;
    use SoftDeletes;
    protected $table = 'list_categories';
    protected $fillable = [
        'name',
        'image'
    ];

    public function films(){
        return $this->belongsToMany(Film::class, 'film_listings', 'film_id', 'list_category_id');
    }
}
