<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class TestRequest extends FormRequest
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
            'name' => 'required|string|max:191',
            'total_questions' => 'required|numeric',
            'score' => 'required|numeric',
            'duration' => 'required|string|max:191',
            'type' => 'required|in:preparation,mock,grand',
            'published' => 'boolean'
        ];
    }
}
