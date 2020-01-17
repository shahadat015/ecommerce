<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Setting;
use Illuminate\Http\Request;

class SettingController extends Controller
{
    public function index()
	{
	    return view('admin.setting.index');
	}

	/**
	 * @param Request $request
	 */
	public function update(Request $request)
	{  
		$request->validate([
			'mail_host' => 'nullable|string|required_with:mail_port',
			'mail_port' => 'nullable|string|required_with:mail_host,mail_username',
			'mail_username' => 'nullable|string|required_with:mail_port,mail_password',
			'mail_password' => 'nullable|string|required_with:mail_username',
			'ssl_commrz_store_id' => 'nullable|string|required_with:ssl_commrz_store_password',
			'ssl_commrz_store_password' => 'nullable|string|required_with:ssl_commrz_store_id',
		]);

		$request['free_shipping_enabled'] = (boolean) $request->free_shipping_enabled;
		$request['local_pickup_enabled'] = (boolean) $request->local_pickup_enabled;
		$request['cod_enabled'] = (boolean) $request->cod_enabled;
		$request['ssl_commrz_enabled'] = (boolean) $request->ssl_commrz_enabled;

		$keys = $request->except('_token', '_method');

        foreach ($keys as $key => $value)
        {
            Setting::set($key, $value);
        }

        return response()->json(['success' => 'Settings successfully updated!']);
	}
}
