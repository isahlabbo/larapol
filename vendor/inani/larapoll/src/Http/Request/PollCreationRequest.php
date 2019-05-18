<?php

namespace Inani\Larapoll\Http\Request;

use Illuminate\Foundation\Http\FormRequest;

class PollCreationRequest extends FormRequest
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
        if($this->isMethod('patch')){
            return [
              'question' => 'required'
            ];
        }

        return [
            'question' => 'present|required',
            'options.*' => 'present|required',
            'starts_at' => 'sometimes',
            'ends_at' => 'sometimes',
        ];
    }

    public function messages()
    {
        return [
            'question.required' => 'Question should be asked',
            'options.1.required' => 'Two options must be used at least',
        ];
    }
}
