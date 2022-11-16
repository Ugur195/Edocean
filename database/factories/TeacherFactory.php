<?php

namespace Database\Factories;

use App\Models\Teacher;
use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Str;

class TeacherFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array
     */
    protected $teacher = Teacher::class;

    public function definition()
    {
        return [
            // $users = [
            //     'id' => $this->faker->unique(),
            //     'fin' => $this ->faker->ean8(),
            //     'name' => $this->faker->name(),
            //     'email' => $this->faker->unique()->safeEmail(),
            //     'email_verified_at' => now(),
            //     'password' => '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi', // password
            //     'remember_token' => Str::random(10),
            // ],
                
            'name' => $this->faker->name(),
            'surname' => $this->faker->name(),
            'see_count' => rand(1, 1000),
            'profile_type' => 'Stndart',
            'about_teacher' => 'Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industrys standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged. It was popularised in the 1960s with the release of Letraset sheets containing Lorem Ipsum passages, and more recently with desktop publishing software like Aldus PageMaker including versions of Lorem Ipsum.',
            'user_id' => rand(1, 100),
            'status' => 1,
        ];
    }
}
