<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Setting extends Model
{
    protected $table = 'edocean.setting';
    protected $fillable = ['id', 'logo', 'url', 'title', 'description', 'description_ru', 'description_en', 'keywords', 'author', 'phone', 'fax',
        'email', 'address', 'country', 'city', 'maps', 'analytics', 'facebook', 'twitter', 'instagram', 'youtube', 'whatsapp', 'google', 'smpt_user',
        'smpt_password', 'host', 'port', 'created_at', 'updated_at'];
}
