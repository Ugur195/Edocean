<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class TeacherCourse extends Model
{
    use HasFactory;

    protected $table = 'edocean.teacher_course';
    protected $fillable = ['id', 'teacher_id', 'course_id', 'status'];
}
