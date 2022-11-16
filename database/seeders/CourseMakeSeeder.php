<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Seeder;

class CourseMakeSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        foreach (range(4000, 4005) as $i) {
            $user = User::create([
                'fin' => 'FGBFDS'.$i,
                'author' => 3,
                'name' => 'Course'.$i,
                'email' => 'adam@mail.ru'.$i,
                'slug' => 'Course'.$i,
                'status' => 1,
                'password' => 'Kanan123'
            ]);

            $user->course()->create([
                'name' => 'Course ' . $user->id,
                'about_course' => 'Otlicniy kurs, vsem sovetuyu',
                'address'=>'28 May metrosunun yani',
                'status' => 1,
            ]);
        }
    }
}
