<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StoreLessonRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        return [
            'lesson_title' => ['required', 'max:255'],
            'lesson_requirement' => ['required', 'max:255'],
            'lesson_image' => ['required', 'mimes:jpeg,png,jpg'],
            'lesson_description' => ['required', 'max:255'],
            'lesson_learn_time' => ['required', 'numeric'],
        ];
    }
}
