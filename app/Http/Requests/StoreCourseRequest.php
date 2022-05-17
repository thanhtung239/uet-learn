<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StoreCourseRequest extends FormRequest
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
            'course_title' => ['required', 'max:255'],
            'course_description' => ['required', 'max:255'],
            'course_image' => ['required', 'mimes:jpeg,png,jpg'],
            'course_price' => ['required', 'numeric'],
            'course_tag' => ['required', 'array']
        ];
    }
}
