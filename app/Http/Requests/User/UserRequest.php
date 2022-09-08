<?php

namespace App\Http\Requests\User;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;

class UserRequest extends FormRequest {
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize() {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, mixed>
     */
    public function rules() {
        return [
            'name'     => 'required',
            'email'    => 'required|email', Rule::when(request()->isMethod( 'POST' ), 'unique:users'),
            'password' => [
                Rule::when( request()->isMethod( 'POST' ), 'required' )],
            'roles'    => [
                Rule::when( request()->isMethod( 'PUT' ), 'exists:roles,id' ),
            ],
        ];
    }

    public function messages() {
        return [
            'name.required' => 'Name is required',
            'email.required' => 'Email is required',
            'email.unique' => 'Email already exists',
            'password.required' => 'Password is required'
        ];
    }
}
