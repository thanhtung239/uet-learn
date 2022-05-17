<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreLessonRequest;
use App\Http\Requests\UpdateLessonRequest;
use Illuminate\Http\Request;
use App\Models\Course;
use App\Models\Lesson;
use stdClass;

class LessonController extends Controller
{
    public function create(Course $course)
    {
        return view('lessons.create', compact('course'));
    }

    public function store(StoreLessonRequest $request, Course $course)
    {
        $lesson = new Lesson();
        $lesson->createLesson($request, $course->id);

        return redirect()->route('courses.show', [$course])->with('success', 'Lesson created successfully');
    }

    public function edit(Course $course, Lesson $lesson)
    {
        return view('lessons.edit', compact('course', 'lesson'));
    }

    public function update(UpdateLessonRequest $request, Course $course, Lesson $lesson)
    {
        $lesson->updateLesson($request, $course->id);

        return redirect()->route('course.lessons.show', [$course, $lesson])->with('success', 'Lesson updated successfully');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show(Course $course, Lesson $lesson)
    {
        $lessonsId = $course->lessons()->orderBy('id', 'asc')->pluck('id')->toArray();
        foreach ($lessonsId as $key => $lessonId) {
            if ($lessonId == $lesson->id) {
                if (isset($lessonsId[$key - 1])) {
                    $lessonPreviousId = $lessonsId[$key - 1];
                } else {
                    $lessonPreviousId = 0;
                }
                if (isset($lessonsId[$key + 1])) {
                    $lessonNextId = $lessonsId[$key + 1];
                } else {
                    $lessonNextId = 0;
                }
                break;
            }
        }
        // dd($lessonsId[1 + 1]);
        // dd($lessons);
        $otherCourses = Course::inRandomOrder()->limit(config('config.numberOfOtherCourses'))->get();
        return view('lessons.show', compact('course', 'lesson', 'otherCourses', 'lessonPreviousId', 'lessonNextId'));
    }

    public function destroy(Course $course, Lesson $lesson)
    {
        Lesson::where('id', $lesson->id)->delete();

        return redirect()->route('courses.show', $course)->with('success', 'Delete the lesson successfully');
    }
}
