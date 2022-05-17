<?php

namespace Database\Factories;

use App\Models\Course;
use App\Models\User;
use Illuminate\Database\Eloquent\Factories\Factory;

class CourseFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = Course::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        $userId = User::all()->pluck('id')->toArray();
        return [
            'title' => $this->faker->name(),
            'teacher_id' => $userId[array_rand($userId, 1)],
            'logo_path' => $this->faker->imageUrl(),
            'description' => $this->faker->realText(),
            'price' => mt_rand(100, 300),
            'learn_times' => mt_rand(100, 1000),
        ];
    }
}
