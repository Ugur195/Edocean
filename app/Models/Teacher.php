<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Teacher extends Model
{
    use HasFactory;

    protected $table = 'edocean.teacher';
    protected $fillable = ['id', 'image', 'father_name', 'birthday', 'gender', 'country', 'city', 'language', 'phone', 'whatsapp', 'facebook',
        'instagram','about_teacher', 'subjects', 'student_level', 'teaching_time', 'subjects_category',
        'demo_lesson', 'teacher_address', 'video_presentation', 'lesson_price', 'students_amount', 'education_place', 'speciality', 'degree',
        'certificate', 'ctf_image', 'work_experience', 'work_place', 'work_position', 'work_date', 'lessons_duration', 'lessons_intensivity',
        'rating', '	balance', 'likes', 'dislike', 'see_count', 'profile_type', 'slug', 'verified_status', 'user_id', 'status'];

    public function subjects() {
        return $this->hasOne(Subjects::class, 'id', 'subjects');
    }
    public function category() {
        return $this->hasOne(SubjectCategory::class, 'id', 'subjects_category');
    }

    public function user()
    {
        return $this->hasOne(User::class, 'id', 'user_id');
    }

    public function teacherUser()
    {
        return $this->hasOne(User::class, 'id', 'user_id');
    }

}
