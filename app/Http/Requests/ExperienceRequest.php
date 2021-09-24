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
            'position_name' => 'required',
            'description' => 'required',
            'year_started' => 'required|integer|digits:4',
            'year_resigned' => 'integer|nullable|digits:4|gt:year_started',
        ];
    }
    public function messages()
    {
        return [
            'year_started.integer' => 'Year Started should be the year started to work.',
            'year_resigned.integer' => 'Year Graduated should be the year resigned.',
        ];
    }
    public function withValidator($validator)
    {
        $messages = $validator->messages();

        foreach ($messages->all() as $message)
        {
            toastr()->error ( $message);
        }

        return $validator->errors()->all();

    }
}
