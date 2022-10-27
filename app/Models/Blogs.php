<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Blogs extends Model
{
    protected $table = 'edocean.blogs';
    protected $fillable = ['id','image', 'title', 'title_ru', 'title_en', 'message', 'message_ru', 'message_en', 'author', 'category', 'likes', 'dislike',
        'comments', 'slug', 'see_count', 'status', 'created_at', 'updated_at'];
}
