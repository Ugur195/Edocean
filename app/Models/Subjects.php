<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Subjects extends Model
{
    protected $table = 'edocean.subjects';
    protected $fillable = ['id','name','name_ru','name_en','subject_category_id','status'];
}
