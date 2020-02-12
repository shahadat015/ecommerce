<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Setting;
use Illuminate\Http\Request;
use App\Http\Requests\SettingsValidate;

class SettingController extends Controller
{
	public function __construct()
    {
        $this->middleware('permission:View Settings')->only(['index']);
        $this->middleware('permission:Update Settings')->only(['update']);
    }

    public function index()
	{
	    return view('admin.setting.index');
	}

	public function update(SettingsValidate $request)
	{  

		$request['free_shipping_enabled'] = (boolean)$request->free_shipping_enabled;
		$request['local_pickup_enabled'] = (boolean)$request->local_pickup_enabled;
		$request['cod_enabled'] = (boolean)$request->cod_enabled;
		$request['ssl_commrz_enabled'] = (boolean)$request->ssl_commrz_enabled;
		$request['facebook_login_enable'] = (boolean)$request->facebook_login_enable;
		$request['google_login_enable'] = (boolean)$request->google_login_enable;

		$this->changeEnv([
            'FACEBOOK_CLIENT_ID'  => $request->facebook_client_id,
            'FACEBOOK_CLIENT_SECRET'  => $request->facebook_client_secret,
            'GOOGLE_CLIENT_ID' => $request->google_client_id,
			'GOOGLE_CLIENT_SECRET' => $request->google_client_secret,
			'STORE_ID' => $request->ssl_commrz_store_id,
			'STORE_PASSWORD' => $request->ssl_commrz_store_password,
			'MAIL_HOST' => $request->mail_host,
			'MAIL_PORT' => $request->mail_port,
			'MAIL_USERNAME' => $request->mail_username,
			'MAIL_PASSWORD' => $request->mail_password,
			'MAIL_FROM_ADDRESS' => $request->mail_from_address,
			'MAIL_FROM_NAME' => $request->mail_from_name
        ]);

		$keys = $request->except('_token', '_method');

        foreach ($keys as $key => $value)
        {
            Setting::set($key, $value);
        }

        return response()->json(['success' => 'Settings successfully updated!']);
	}

	public function changeEnv(array $values)
	{

	    $envFile = app()->environmentFilePath();
	    $str = file_get_contents($envFile);

	    if (count($values) > 0) {
	        foreach ($values as $envKey => $envValue) {

	            $str .= "\n"; // In case the searched variable is in the last line without \n
	            $keyPosition = strpos($str, "{$envKey}=");
	            $endOfLinePosition = strpos($str, "\n", $keyPosition);
	            $oldLine = substr($str, $keyPosition, $endOfLinePosition - $keyPosition);

	            // If key does not exist, add it
	            if (!$keyPosition || !$endOfLinePosition || !$oldLine) {
	                $str .= "{$envKey}={$envValue}\n";
	            } else {
	                $str = str_replace($oldLine, "{$envKey}={$envValue}", $str);
	            }

	        }
	    }

	    $str = substr($str, 0, -1);
	    if (!file_put_contents($envFile, $str)) return false;
	    return true;

	}

}
