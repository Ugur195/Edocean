<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class ContactUs extends Model
{
    protected $table = 'edocean.contact_us';
    protected $fillable = ['id', 'full_name', 'subject', 'email', 'message', 'read_unread', 'status'];
}
