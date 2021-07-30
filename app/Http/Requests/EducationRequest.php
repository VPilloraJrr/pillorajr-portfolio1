<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class EducationRequest extends FormRequest
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
            'school_name' => 'required',
            'year_started' => 'required|integer',
            'year_graduated' => 'integer|nullable',
            'logo' => 'nullable|mimes:jpeg,png,jpg,bmp',
        ];
    }
    public function messages()
    {
        return [
            'year_started.integer' => 'Year Started should be the year started to study.',
            'year_graduated.integer' => 'Year Graduated should be the year graduated.',
        ];
    }
}
