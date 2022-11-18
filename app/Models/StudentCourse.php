<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class StudentCourse extends Model
{
    protected $table = 'edocean.student_course';
    protected $fillable = ['id', 'course_id', 'teacher_id', 'user_id', 'status'];
}
