<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ReviewMood extends Model
{
    use HasFactory;
    protected $table = 'review_moods';

    public function reviews(){
        return $this->hasMany(Review::class);
    }
}
