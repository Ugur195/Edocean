<?php

namespace Database\Seeders;

use App\Models\Teacher;
use App\Models\User;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class TeacherMakeSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        // Teacher::factory()-count(5)->create();

        // for($i = 1000; $i < 1005; $i++) {
        //     $userId = DB::table('users')->insertGetId([
        //         'fin' => 'FGBFDS'.$i,
        //         'author' => 3,
        //         'name' => 'Teacher'.$i,
        //         'email' => 'adam@mail.ru'.$i,
        //         'slug' => 'Teacher'.$i,
        //         'status' => 1,
        //         'password' => 'Kanan123'
        //     ]);

        //     DB::table('teacher')->insert([
        //         'name' => 'Teacher'.$i,
        //         'surname' => 'Adam',
        //         'see_count' => rand(200,1500),
        //         'profile_type' => 'Basic',
        //         'about_teacher' => 'Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industrys standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged. It was popularised in the 1960s with the release of Letraset sheets containing Lorem Ipsum passages, and more recently with desktop publishing software like Aldus PageMaker including versions of Lorem Ipsum.',
        //         'user_id' => $userId
        //     ]);
        // }

        foreach (range(2000, 2005) as $i) {
            $user = User::create([
                'fin' => 'FGBFDS'.$i,
                'author' => 3,
                'name' => 'Teacher'.$i,
                'email' => 'adam@mail.ru'.$i,
                'slug' => 'Teacher'.$i,
                'status' => 1,
                'password' => 'Kanan123'
            ]);

            $user->teacher()->create([
                'name' => 'Teacher ' . $user->id,
                'surname' => 'Adam',
                'see_count' => rand(200,1500),
                'profile_type' => 'Basic',
                'status' => 1,
                'about_teacher' => 'Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industrys standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged. It was popularised in the 1960s with the release of Letraset sheets containing Lorem Ipsum passages, and more recently with desktop publishing software like Aldus PageMaker including versions of Lorem Ipsum.',
            ]);
        }
    }
}
