<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class SubjectCategory extends Model
{
    protected $table = 'edocean.subject_category';
    protected $fillable = ['id','name','name_ru','name_en','parent_category','slug','status','created_at','updated_at'];
}
