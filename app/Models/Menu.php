<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Menu extends Model
{
    protected $table = 'edocean.menu';
    protected $fillable = ['id', 'name', 'name_ru', 'name_en', 'page', 'slug', 'status'];
}
