<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Course extends Model
{
    protected $table = 'edocean.course';
    protected $fillable = ['id', 'image', 'name', 'video_presentation', 'certificate', 'stf_image', 'mmc', 'address', 'email', 'password', 'phone',
        'skype_id', 'profile_title', 'about_course', 'subjects', 'subjects_category', 'demo_lesson', 'lesson_cost', 'balance', 'rating',
        'likes', 'dislike', 'see_count','course_type', 'language', 'lessons_duration', 'lessons_intensivity', 'students_amount', 'slug', 'country', 'city', 'user_id', 'verified_status', 'status'];
}
