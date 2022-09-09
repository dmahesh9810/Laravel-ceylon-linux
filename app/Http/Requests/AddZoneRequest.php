<?php

namespace App\Http\Requests;

use App\Models\Role;
use Illuminate\Foundation\Http\FormRequest;

class AddZoneRequest extends FormRequest
{

    public function authorize()
    {
        return $this->user()->hasRole(Role::ROLE_ADMIN);
    }


    public function rules()
    {
        return [
            'code' => 'required',
            'discription' => 'required',
            'short_discription' => 'required',
        ];
    }
}