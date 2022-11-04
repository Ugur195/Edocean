<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class StudentAttendance extends Model
{
    protected $table = 'edocean.student_attendance';
    protected $fillable = ['id', 'student_id', 'subject_id', 'attendance', 'status'];
}
