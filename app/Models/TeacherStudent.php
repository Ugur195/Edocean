<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class TeacherStudent extends Model
{
    use HasFactory;

    protected $table = 'edocean.teacher_student';
    protected $fillable = ['id', 'course_id', 'student_id', 'user_id', 'status'];
}
