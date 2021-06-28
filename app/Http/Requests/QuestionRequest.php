<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class QuestionRequest extends FormRequest
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
            'question' => 'required|string',
            'level' => 'required|in:easy, medium, hard',
            'score' => 'required|numeric',
            'subject' => 'required|exists:subjects,id',
            'option' => 'required|array|size:4',
            "option.*"  => "required|string|distinct",
            'correct' => 'required|in: 0, 1, 2, 3',
        ];
    }
}
