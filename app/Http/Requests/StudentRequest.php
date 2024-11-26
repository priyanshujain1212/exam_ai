<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;

class StudentRequest extends FormRequest
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
            'name' => ['required', 'string', 'max:60'],
            'organisation'      => ['required', 'max:60'],
            'exams'     => ['required', 'max:60'],
            'free_mock_tests'    => ['nullable', 'max:200'],
            'is_registered'      => ['required', 'max:60'],
        ];
    }

}
