<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Student extends Model
{
    protected $table = 'edocean.student';
    protected $fillable = ['id', 'image', 'name', 'surname', 'father_name', 'birthday', 'gender', 'language', 'email', 'password', 'country',
        'city', 'phone', 'skype_id', 'parent', 'education_level', 'lesson_duration', 'lessons_intensivity', 'address', 'teacher_status',
        'teacher_gender', 'students_amount', 'student_mission', 'payment', 'balance', 'verified_status', 'user_id', 'status', 'created_at', 'updated_at'
    ];
}
