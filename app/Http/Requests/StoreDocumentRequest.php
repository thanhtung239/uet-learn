<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StoreDocumentRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        return false;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        return [
            'document_name' => ['required', 'max:255'],
            'document_type' => ['required', 'max:255'],
            'document_image' => ['required', 'mimes:jpeg,png'],
            'document_file' => ['required', 'mimes:pdf,mp4,doc,docx'],
        ];
    }
}
