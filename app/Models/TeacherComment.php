<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class TeacherComment extends Model
{
    protected $table = 'edocean.teacher_comment';
    protected $fillable = ['id', 'name', 'email', 'message', 'teacher_slug', 'parent_comment', 'user_id', 'status', 'created_at', 'updated_at'];
}
