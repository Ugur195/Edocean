<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasManyThrough;

class BlogCategory extends Model
{
    protected $table = 'edocean.blog_category';
    protected $fillable = ['id', 'name', 'slug', 'status'];

    public function blogs() {
        return $this->hasMany(Blogs::class, 'category_id', 'id');
    }

    public function comments(): HasManyThrough
    {
        return $this->hasManyThrough(
            BlogComment::class,
            Blogs::class,
            'category_id',
            'blog_id',
            'id',
            'id'
        );
    }
}
