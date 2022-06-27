<?php

namespace App\Http\Requests\Admin;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;

class DomainRequest extends FormRequest
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
                $locale . '_name' =>  ['required', 'string', 'unique:domain_translations,name'],
            ];
        }

        $rules['image'] = ['required', 'mimes:jpeg,jpg,png', 'max:2000'];

        if (in_array($this->method(), ['PUT', 'PATCH'])) {

            $domain = $this->route()->parameter('domain');

            foreach (config('translatable.locales') as $locale) {
                $rules = [
                    $locale . '_name' =>  ['required', 'string', Rule::unique('domain_translations', 'name')->ignore($domain->id, 'domain_id')],
                ];
            }
        } //end of if

        return $rules;
    } // end of rules

} //end of request