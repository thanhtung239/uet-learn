<?php

namespace Database\Factories;

use App\Models\CourseTag;
use App\Models\Course;
use App\Models\Tag;
use App\Models\User;
use Illuminate\Database\Eloquent\Factories\Factory;

class CourseTagFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = CourseTag::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        $courseId = Course::all()->pluck('id')->toArray();
        $tagId = Tag::all()->pluck('id')->toArray();
        return [
            'course_id' => $courseId[array_rand($courseId, 1)],
            'tag_id' => $tagId[array_rand($tagId, 1)]
        ];
    }
}
