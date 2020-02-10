<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class CheckoutValidate extends FormRequest
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
            'billing.name' => 'required|string|max:60',
            'billing.phone' => 'required|string|max:30',
            'email' => 'required|email|max:60',
            'password' => 'nullable|required_with:create_account|string|min:8',
            'billing.address' => 'required|string|max:60',
            'billing.country' => 'required|string|max:60',
            'billing.city' => 'required|string|max:60',
            'billing.zip_code' => 'required|integer',
            'shipping.name' => 'nullable|required_with:ship_to_a_different_address|string|max:60',
            'shipping.phone' => 'nullable|required_with:ship_to_a_different_address|string|max:60',
            'shipping.address' => 'nullable|required_with:ship_to_a_different_address|string|max:255',
            'shipping.country' => 'nullable|required_with:ship_to_a_different_address',
            'shipping.city' => 'nullable|required_with:ship_to_a_different_address',
            'shipping.zip_code' => 'nullable|required_with:ship_to_a_different_address'
        ];
    }
}
