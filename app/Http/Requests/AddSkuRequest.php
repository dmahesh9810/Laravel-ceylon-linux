<?php

namespace App\Http\Requests;

use App\Models\Role;
use Illuminate\Foundation\Http\FormRequest;

class AddSkuRequest extends FormRequest
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
            // 'skuid' => 'sometime',
            // 'skucode' => 'sometime',
            'name' => 'required',
            'mrp' => 'required|numeric',
            'distributor_price' => 'required|numeric',
            'weight' => 'required|numeric',
            'weight_id' => 'required',
        ];
    }
}