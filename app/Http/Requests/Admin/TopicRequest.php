<?php

namespace App\Http\Requests\Admin;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;

class TopicRequest extends FormRequest
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
                $locale . '_name' =>  ['required', 'string', 'unique:topic_translations,name'],
            ];
        }

        if (in_array($this->method(), ['PUT', 'PATCH'])) {

            $topic = $this->route()->parameter('topic');

            foreach (config('translatable.locales') as $locale) {
                $rules = [
                    $locale . '_name' =>  ['required', 'string', Rule::unique('topic_translations', 'name')->ignore($topic->id, 'topic_id')],
                ];
            }
        } //end of if

        return $rules;
    } // end of rules

} //end of request