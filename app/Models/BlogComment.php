<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class BlogComment extends Model
{
    protected $table = 'edocean.blog_comment';
    protected $fillable = ['id', 'name', 'email', 'message', 'blog_id', 'parent_id', 'user_id', 'status'];

    public function ParentBlogsComments()
    {
        return $this->hasMany(BlogComment::class, 'parent_id');
    }

    public function UsersComments()
    {
        return $this->hasOne(User::class, 'id', 'user_id');
    }

    public function AdminComments()
    {
        return $this->hasOne(Admin::class, 'user_id', 'user_id');
    }


}
