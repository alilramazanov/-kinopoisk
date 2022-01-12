<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Evaluation extends Model
{
    use HasFactory;
    protected $table = 'evaluations';
    protected $fillable = [
        'user_id',
        'film_id',
        'score'
    ];


    public function film(){
        return $this->belongsTo(Film::class);
    }

    public function user(){
        return $this->belongsTo(User::class);
    }
}
