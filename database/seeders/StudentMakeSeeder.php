<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Seeder;

class StudentMakeSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        foreach (range(3000, 3005) as $i) {
            $user = User::create([
                'fin' => 'FGBFDS'.$i,
                'author' => 3,
                'name' => 'Student'.$i,
                'email' => 'adam@mail.ru'.$i,
                'slug' => 'Student'.$i,
                'status' => 1,
                'password' => 'Kanan123'
            ]);

            $user->student()->create([
                'name' => 'Student ' . $user->id,
                'surname' => 'Adam',
                'gender' => 'M',
                'status' => 1,
                'student_mission' => 'Dobitsa Uspexa',
            ]);
        }
    }
}
