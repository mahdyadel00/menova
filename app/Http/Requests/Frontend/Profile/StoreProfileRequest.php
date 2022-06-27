<?php

namespace App\Http\Requests\Frontend\Profile;

use Illuminate\Foundation\Http\FormRequest;

class StoreProfileRequest extends FormRequest
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
            "first_name" => ['required', 'string', 'min:3', 'max:191'],
            "last_name" => ['required', 'string', 'min:3', 'max:191'],
            "location" => ['required', 'string'],
            "roles" => ['required', 'exists:roles,name'],
            "phone" => ['required', 'number'],
            "domain_id" => ['required'],
        ];
    }
}