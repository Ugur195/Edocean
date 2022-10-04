<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class StudentSchedule extends Model
{
    protected $table = 'edocean.student_schedule';
    protected $fillable = ['id', 'student_id', 'subject_id', 'schedule', 'status', 'created_at', 'updated_at'];
}
