<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class BlogCategory extends Model
{
    protected $table = 'edocean.blog_category';
    protected $fillable = ['id', 'name', 'slug', 'status', 'created_at', 'updated_at'];
}
