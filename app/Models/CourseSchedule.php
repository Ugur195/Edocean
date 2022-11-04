<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class CourseSchedule extends Model
{
    protected $table = 'edocean.course_schedule';
    protected $fillable = ['id', 'course_id', 'subjects_id', 'day1', 'day2', 'day3', 'day4', 'day5', 'day6', 'day7',
        'status'];
}
