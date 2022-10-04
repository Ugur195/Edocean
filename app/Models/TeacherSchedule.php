<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class TeacherSchedule extends Model
{
    protected $table = 'edocean.teacher_schedule';
    protected $fillable = ['id', 'teacher_id', 'subject_id', 'day1', 'day2', 'day3', 'day4', 'day5', 'day6', 'day7', 'status', 'created_at', 'updated_at'];
}
