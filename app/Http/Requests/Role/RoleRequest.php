<?php

namespace App\Http\Requests\Role;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;

class RoleRequest extends FormRequest {
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize() {
        if (auth()->user()){
            return true;
        }
        return  false;    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, mixed>
     */
    public function rules() {
        return [
            'name'       => 'required',
            'permissions' => [
                Rule::when( request()->isMethod( 'PUT' ), 'required|exists:permissions,id' )],
        ];
    }
}
