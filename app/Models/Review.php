<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Review extends Model
{
    use HasFactory;
    use SoftDeletes;
    protected $table = 'reviews';
    protected $fillable = [
        'title',
        'text',
        'user_id',
        'film_id',
        'review_mood_id',
        'is_critic'
    ];

    public function reviewMood(){
        return $this->belongsTo(ReviewMood::class);
    }

    public function user(){
        return $this->belongsTo(User::class);
    }

    public function film(){
        return $this->belongsTo(Film::class);
    }
}
