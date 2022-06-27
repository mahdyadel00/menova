<?php

namespace App\Http\Requests\Admin;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;

class ProjectTypeRequest extends FormRequest
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
        $rules = [];
        foreach (config('translatable.locales') as $locale) {
            $rules += [
                $locale . '_name' =>  ['required', 'string', 'unique:project_type_translations,name'],
            ];
        }

        if (in_array($this->method(), ['PUT', 'PATCH'])) {

            $project_type = $this->route()->parameter('project_type');

            foreach (config('translatable.locales') as $locale) {
                $rules = [
                    $locale . '_name' =>  ['required', 'string', Rule::unique('project_type_translations', 'name')->ignore($project_type->id, 'project_type_id')],
                ];
            }
        } //end of if

        return $rules;
    } // end of rules

} //end of request