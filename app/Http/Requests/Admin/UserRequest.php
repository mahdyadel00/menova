<?php

namespace App\Http\Requests\Admin;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;

class UserRequest extends FormRequest
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
            'first_name' => 'required',
            'last_name' => 'required',
            'phone' => 'required|unique:users',
            'email' => 'required|email|unique:users',
            'roles'    => "required|array|min:1",
            'roles.*'  => "required|string|distinct|min:1",
            'accept_policy' => '',
            'image' => 'image|max:2000'
        ];

        if (in_array($this->method(), ['PUT', 'PATCH'])) {

            $user = $this->route()->parameter('user');

            $rules['email'] = 'required|email|unique:users,id,' . $user->id;
            $rules['phone'] = ['required', Rule::unique('users', 'phone')->ignore($user->id, 'id')];
        } //end of if

        return $rules;
    } //end of rules

    protected function prepareForValidation()
    {
        return $this->merge([
            'accept_policy' => true
        ]);
    } //end of prepare for validation
}