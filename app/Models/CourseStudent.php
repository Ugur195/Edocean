<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class CourseStudent extends Model
{
    protected $table = 'edocean.course_student';
    protected $fillable = ['id', 'student_id', 'teacher_id', 'user_id', 'status'];
}
