<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Post extends Model
{
    protected $fillable = ['title', 'content', 'is_show', 'category_id'];

    public function category()
    {
        return $this->belongsTo(Category::class);
    }
}