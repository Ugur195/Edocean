<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class BlogComment extends Model
{
    protected $table = 'edocean.blog_comment';
    protected $fillable = ['id', 'name', 'email', 'message', 'blog_id', 'parent_comment', 'user_id', 'status', 'created_at', 'updated_at'];
}
