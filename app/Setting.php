<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Config;

class Setting extends Model
{
    protected $fillable = ['key', 'value'];
    protected $casts = [
    	'free_shipping_enabled' => 'boolean',
 		'local_pickup_enabled' => 'boolean',
 		'cod_enabled' => 'boolean',
 		'ssl_commrz_enabled' => 'boolean',
 		'facebook_login_enable' => 'boolean',
 		'google_login_enable' => 'boolean'
 
    ];

    /**
	 * @param $key
	 */
	public static function get($key)
	{
	    $setting = new self();
	    $entry = $setting->where('key', $key)->first();
	    if (!$entry) {
	        return;
	    }
	    return $entry->value;
	}

	/**
	 * @param $key
	 * @param null $value
	 * @return bool
	 */
	public static function set($key, $value = null)
	{
	    $setting = new self();
	    $entry = $setting->where('key', $key)->firstOrFail();
	    $entry->value = $value;
	    $entry->saveOrFail();
	    Config::set('key', $value);
	    if (Config::get($key) == $value) {
	        return true;
	    }
	    return false;
	}
}
