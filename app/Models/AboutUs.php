<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class AboutUs extends Model
{
    protected $table = 'edocean.about_us';
    protected $fillable = ['id', 'our_responsib', 'our_responsib_ru', 'our_responsib_en', 'content_az', 'content_ru', 'content_en', 'video_link',
        'video_sub_title', 'video_sub_title_ru', 'video_sub_title_en', 'our_purpose', '	our_purpose_ru', 'our_purpose_en'];
}
