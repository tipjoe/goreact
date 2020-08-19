<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class UploadFileRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        // We could add logic to see if the user is authorized here,
        // but we'll just return true for now.
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
            'myfile' => 'required|mimetypes:image/jpeg,video/mp4,application/pdf'
        ];
    }

    public function messages() {
        return [
            'myfile.mimetypes' => 'We only accept JPG images, MP4 videos, and PDF documents.',
            'myfile.required' => 'You need to select a file.'
        ];
    }
}
