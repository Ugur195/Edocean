<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class CourseStudent extends Model
{
    protected $table = 'edocean.course_student';
    protected $fillable = ['id', 'teacher_id', 'student_id', 'status'];
}
