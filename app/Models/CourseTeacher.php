<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class CourseTeacher extends Model
{
    protected $table = 'edocean.course_teacher';
    protected $fillable = ['id', 'teacher_id', 'student_id','user_id', 'status'];
}
