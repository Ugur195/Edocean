<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Admin extends Model
{
    protected $table = 'edocean.admin';
    protected $fillable = ['id', 'image', 'first_name', 'last_name', 'father_name', 'birthday', 'email', 'password', 'user_id', 'status'];
}
