<?php

namespace App\Models;

use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Illuminate\Support\Facades\DB;
use Laravel\Sanctum\HasApiTokens;

class User extends Authenticatable implements MustVerifyEmail
{
    use HasApiTokens;
    use HasFactory;
    use Notifiable;

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

    public function type()
    {
        $type = $this->findTable(); // $arr = [ADMIN, A] $arr[1]

//        return DB::select("select to_bsase64(a.image) image from users u left join admin a on u.id = a.user_id");
        return DB::select("select {$type[1]}.image from users u left join {$type[0]} ${type[1]} on u.id = ${type[1]}.user_id where u.id=?", [auth()->user()->id])[0];
    }

    private function findTable()
    {
        if (! in_array(auth()->user()->author, [1, 2, 3, 4])) {
            throw new \Exception("User type mismatch");
        }

        if (auth()->user()->author == 1) {
            return ['admin', 'a'];
        }

        if (auth()->user()->author == 2) {
            return ['course', 'c'];
        }

        if (auth()->user()->author == 3) {
            return ['teacher', 't'];
        }

        if (auth()->user()->author == 4) {
            return ['student', 's'];
        }
    }

    public function admin()
    {
        return $this->hasOne(Admin::class, 'user_id');
    }

    public function teacher()
    {
        return $this->hasOne(Teacher::class, 'user_id');
    }

    public function student()
    {
        return $this->hasOne(Student::class, 'user_id');
    }

    public function course()
    {
        return $this->hasOne(Course::class, 'user_id');
    }


}
