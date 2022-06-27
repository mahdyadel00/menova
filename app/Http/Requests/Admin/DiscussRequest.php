<?php

namespace App\Http\Requests\Admin;

use Illuminate\Foundation\Http\FormRequest;

class DiscussRequest extends FormRequest
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
        $rules = [
            'title' => ['required', 'string', 'min:3'],
            'body' => ['required'],
            'topic_id' => ['required', 'exists:topics,id'],
        ];

        if (in_array($this->method(), ['PUT', 'PATCH'])) {

            $discuss = $this->route()->parameter('discuss');

            $rules['title'] = ['required', 'string', 'min:3'];
            $rules['body'] = ['required'];
            $rules['topic_id'] = ['required', 'exists:topics,id'];
        } //end of if

        return $rules;
    } //end of rules

}//end of request