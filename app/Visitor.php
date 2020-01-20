<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Visitor extends Model
{
    protected $fillable = [
    	'ip', 'country', 'state', 'city', 'postal_code', 'lat', 'lon', 'timezone', 'currency'
	];

	public static function saveVisitor()
	{
		$ip = request()->ip();
		$visitor = geoip($ip);

		self::create([
			'ip' => $visitor->ip, 
			'country' => $visitor->country, 
			'state' => $visitor->state, 
			'city' => $visitor->city, 
			'postal_code' => $visitor->postal_code, 
			'lat' => $visitor->lat, 
			'lon' => $visitor->lon, 
			'timezone' => $visitor->timezone, 
			'currency' => $visitor->currency
		]);

		cache([$ip => $ip], now()->addDays());
	}

	public static function laratablesCreatedAt($visitor)
    {
        return $visitor->created_at->diffForHumans();
    }

	public static function laratablesCustomAction($action)
    {
        return view('layouts.partials.actions')->with(['view' => false, 'edit' => false, 'action' => $action, 'route' => $action->getTable()])->render();
    }
}
