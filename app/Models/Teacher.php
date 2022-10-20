<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Teacher extends Model
{
    protected $table = 'edocean.teacher';
    protected $fillable = ['id', 'image', 'name', 'surname', 'father_name', 'birthday', 'gender', 'email', 'password', 'country',
        'city', 'language', 'phone', 'skype_id', 'profile_title', 'about_teacher', 'subjects', 'student_level', 'teaching_time', 'subjects_category',
        'demo_lesson', 'teacher_address', 'video_presentation', 'lesson_price', 'students_amount', 'education_place', 'speciality', 'degree',
        'certificate', 'ctf_image', 'work_experience', 'work_place', 'work_position', 'work_date', 'lessons_duration', 'lessons_intensivity',
        'rating', '	balance', 'likes', 'dislike', 'see_count', 'profile_type', 'slug', 'verified_status', 'user_id', 'status', 'created_at', 'updated_at'
    ];
}
