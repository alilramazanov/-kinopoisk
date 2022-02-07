<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Heading extends Model
{
    use HasFactory;
    protected $table = 'headings';
    protected $fillable = [
        'name'
    ];

    public function articles(){
        return $this->belongsToMany(Article::class, 'articles_headings', 'article_id', 'heading_id');
    }
}
