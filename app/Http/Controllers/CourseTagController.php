<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Course;
use App\Models\Tag;
use App\Models\CourseTag;
use stdClass;

class CourseTagController extends Controller
{
    public function store(Request $request)
    {
        $course = Course::findOrFail($request['course_id']);
        $courseTags = CourseTag::where('course_id', $request['course_id'])->pluck('tag_id')->toArray();
        
        if (!in_array($request['add_tag'], $courseTags)) {
            $course->tags()->attach($request['add_tag']);
        }

        return back()->with('success', 'Add tag successfully!');
    }

    public function detroy(Request $request)
    {
        // $course->tags()->detach($request['add_tag']);

        return back()->with('success', 'Remove tag successfully!');
    }
}
