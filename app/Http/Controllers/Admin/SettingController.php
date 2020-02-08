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

		$keys = $request->except('_token', '_method');

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
