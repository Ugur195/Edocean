<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Student extends Model
{
    protected $table = 'edocean.student';
    protected $fillable = ['id', 'image', 'surname', 'father_name', 'birthday', 'gender', 'language', 'country',
        'city', 'phone', 'parent', 'subjects', 'subjects_category', 'education_level',
        'lesson_duration', 'lessons_intensivity', 'address', 'teacher_status', 'teacher_gender',
        'students_amount', 'student_mission', 'payment', 'balance', 'verified_status', 'user_id', 'status'];


    public function subjects()
    {
        return $this->hasOne(Subjects::class, 'id', 'subjects');
    }

    public function category()
    {
        return $this->hasOne(SubjectCategory::class, 'id', 'subjects_category');
    }

    public function user()
    {
        return $this->hasOne(User::class, 'id', 'user_id');
    }

    public function studentUser()
    {
        return $this->hasOne(User::class, 'id', 'user_id');
    }
}


