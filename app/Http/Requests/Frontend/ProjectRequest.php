<?php

namespace App\Http\Requests\Frontend;

use Illuminate\Foundation\Http\FormRequest;

class ProjectRequest extends FormRequest
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
            'description' => ['required'],
            'project_type_id' => ['required', 'exists:project_types,id'],
            'domain_id' => ['required', 'exists:domains,id'],
        ];

        if (request()->file)
            $rules['file'] = ['mimes:jpeg,jpg,png,pdf,doc,docx', 'max:2000'];

        if (in_array($this->method(), ['PUT', 'PATCH'])) {

            $project = $this->route()->parameter('project');

            $rules['title'] = ['required', 'string', 'min:3'];
            $rules['description'] = ['required'];
            $rules['project_type_id'] = ['required', 'exists:project_types,id'];
            $rules['domain_id'] = ['required', 'exists:domains,id'];
        } //end of if

        return $rules;
    } //end of rules

}//end of request