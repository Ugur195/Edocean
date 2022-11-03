<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class BlogCategory extends Model
{
    protected $table = 'edocean.blog_category';
    protected $fillable = ['id', 'name', 'slug', 'status'];

    public function blogs() {
        return $this->hasMany(Blogs::class, 'category', 'id');
    }
}
