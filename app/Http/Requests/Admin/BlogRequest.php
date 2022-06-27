<?php

namespace App\Http\Requests\Admin;

use Illuminate\Foundation\Http\FormRequest;

class BlogRequest extends FormRequest
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
                $locale . '_title' =>  ['required', 'string'],
                $locale . '_body' =>  ['required'],
            ];
        }

        $rules = [
            'domain_id' => ['required', 'exists:domains,id'],
        ];

        if (in_array($this->method(), ['PUT', 'PATCH'])) {

            $blog = $this->route()->parameter('blog');
            foreach (config('translatable.locales') as $locale) {
                $rules += [
                    $locale . '_title' =>  ['required', 'string'],
                    $locale . '_body' =>  ['required'],
                ];
            }
            $rules['domain_id'] = ['required', 'exists:domains,id'];
        } //end of if

        return $rules;
    } //end of rules

}//end of request
