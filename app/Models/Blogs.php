<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Blogs extends Model
{
    protected $table = 'edocean.blogs';
    protected $fillable = ['id','image', 'title', 'title_ru', 'title_en', 'message', 'message_ru', 'message_en', 'author',
        'category_id', 'likes', 'dislike', 'slug', 'see_count', 'status'];


    public function comments() {
        return $this->hasMany(BlogComment::class, 'blog_id');
    }
    public function admin(){
        return $this->hasOne(Admin::class, 'user_id', 'author');
    }
    public function users(){
        return $this->hasOne(User::class, 'id', 'author');
    }
}
