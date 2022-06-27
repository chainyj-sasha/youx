<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Article extends Model
{
    use HasFactory;

    protected $fillable = [
        'title',
        'slug',
        'text',
        'small_pic',
        'big_pic',
    ];

    public function categories()
    {
        return $this->belongsToMany(Category::class);
    }
}
