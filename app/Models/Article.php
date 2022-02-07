<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Article extends Model
{
    use HasFactory;
    use SoftDeletes;
    protected $table = 'articles';
    protected $fillable = [
        'user_id',
        'heading_id',
        'title',
        'text',
    ];

    public function headings() {
        return $this->belongsToMany(Heading::class, 'articles_headings', 'heading_id', 'article_id');
    }
}
