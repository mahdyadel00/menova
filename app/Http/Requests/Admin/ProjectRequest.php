<?php

namespace App\Http\Requests\Admin;

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
            'link' => ['required', 'string', 'min:3'],
            'description' => ['required'],
            'project_type_id' => ['required', 'exists:project_types,id'],
            'domain_id' => ['required', 'exists:domains,id'],
            'user_id' => ['required', 'exists:users,id|nullable'],
            'image' => ['sometimes|nullable|image'],
        ];

        if (request()->image)
            $rules['image'] = ['mimes:jpeg,jpg,png', 'max:2000'];
        if (request()->attachment)
            $rules['attachment'] = ['mimes:pdf,doc,docx'];

        if (in_array($this->method(), ['PUT', 'PATCH'])) {

            $project = $this->route()->parameter('project');

            $rules['title'] = ['required', 'string', 'min:3'];
            $rules['link'] = ['required', 'string', 'min:3'];
            $rules['description'] = ['required'];
            $rules['project_type_id'] = ['required', 'exists:project_types,id'];
            $rules['domain_id'] = ['required', 'exists:domains,id'];
            $rules['user_id'] = ['required', 'exists:users,id|nullable'];
            $rules['image'] = ['sometimes|nullable|image'];

        } //end of if

        return $rules;
    } //end of rules

}//end of request
