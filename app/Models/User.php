<?php

namespace App\Models;

use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Laravel\Sanctum\HasApiTokens;

class User extends Authenticatable implements MustVerifyEmail
{
    use HasApiTokens, HasFactory, Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = ['id', 'name', 'fin', 'author', 'email', 'password', 'slug', 'status'];

    /**
     * The attributes that should be hidden for serialization.
     *
     * @var array<int, string>
     */
    protected $hidden = [
        'password',
        'remember_token',
    ];

    /**
     * The attributes that should be cast.
     *
     * @var array<string, string>
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];

    public function role()
    {
        return $this->author;
    }

    public function userType()
    {
        // return $this->findModel();
        if (! $this->findModel()) {
            return $this->belongsTo($this->findModel(), 'id', 'user_id');
        }
    }

    private function findModel()
    {
        if (auth()->guest()) {
            return false;
        }

        if (! in_array(auth()->user()->author, [1, 2, 3, 4])) {
            return false;
        }

        if (auth()->user()->author == 1) {
            return Admin::class;
        }
    }
}
