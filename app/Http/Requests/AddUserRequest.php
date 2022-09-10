<?php

namespace App\Http\Requests;

use App\Models\Role;
use Illuminate\Foundation\Http\FormRequest;

class AddUserRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        return $this->user()->hasRole(Role::ROLE_ADMIN);
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, mixed>
     */
    public function rules()
    {
        return [
            'name' => 'required|string',
            'nic' => 'required',
            'address' => 'required',
            'mobile' => 'required|numeric|unique:users',
            'email' => 'required|unique:users',
            'gender' => 'required',
            'territorie_id' => 'required',
            'user_name' => 'required|unique:users',
            'password' => 'required',

        ];
    }
}