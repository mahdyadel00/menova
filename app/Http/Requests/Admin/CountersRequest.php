<?php

namespace App\Http\Requests\Admin;

use Illuminate\Foundation\Http\FormRequest;

class CountersRequest extends FormRequest
{
    /**
     * Determine if the u
     *  is authorized to make this request.
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
        $rules['published'] = ['nullable'];
        $rules['counter'] = ['nullable'];

        foreach (config('translatable.locales') as $locale) {
            $rules += [
                $locale . '_title' =>  ['required', 'string'],
                $locale . '_description' =>  ['required'],
            ];
        }



        if (in_array($this->method(), ['PUT', 'PATCH'])) {

            $blog = $this->route()->parameter('blog');
            foreach (config('translatable.locales') as $locale) {
                $rules += [
                    $locale . '_title' =>  ['required', 'string'],
                    $locale . '_description' =>  ['required'],
                ];
            }

        $rules['published'] = ['nullable'];
        $rules['counter'] = ['nullable'];

        } //end of if

        return $rules;
    } //end of rules


}//end of request
