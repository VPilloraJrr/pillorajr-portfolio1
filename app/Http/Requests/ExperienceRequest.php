<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class ExperienceRequest extends FormRequest
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
            'year_started' => 'integer',
            'year_resigned' => 'integer|nullable',
        ];
    }
    public function messages()
    {
        return [
            'year_started.integer' => 'Year Started should be the year started to work.',
            'year_resigned.integer' => 'Year Graduated should be the year resigned.',
        ];
    }
}
