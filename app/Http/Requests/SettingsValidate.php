<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class SettingsValidate extends FormRequest
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
            'mail_host' => 'nullable|string|required_with:mail_port',
            'mail_port' => 'nullable|string|required_with:mail_host,mail_username',
            'mail_username' => 'nullable|string|required_with:mail_port,mail_password',
            'mail_password' => 'nullable|string|required_with:mail_username',
            'ssl_commrz_label' => 'nullable|string|required_with:ssl_commrz_enabled',
            'ssl_commrz_store_id' => 'nullable|string|required_with:ssl_commrz_enabled',
            'ssl_commrz_store_password' => 'nullable|string|required_with:ssl_commrz_enabled',
            'cod_label' => 'nullable|string|required_with:cod_enabled',
            'free_shipping_label' => 'nullable|string|required_with:free_shipping_enabled',
            'free_shipping_min_amount' => 'nullable|string|required_with:free_shipping_enabled',
            'local_pickup_label' => 'nullable|string|required_with:local_pickup_enabled',
            'local_pickup_cost' => 'nullable|string|required_with:local_pickup_enabled',
            'facebook_client_id' => 'nullable|string|required_with:facebook_login_enable',
            'facebook_client_secret' => 'nullable|string|required_with:facebook_login_enable',
            'google_client_id' => 'nullable|string|required_with:google_login_enable',
            'google_client_secret' => 'nullable|string|required_with:google_login_enable'
        ];
    }
}
