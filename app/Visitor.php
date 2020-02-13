<?php

namespace App;

use App\Http\Traits\ActivityLog;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;

class Visitor extends Model
{
	use ActivityLog;
    
    protected static $recordEvents = ['deleted'];

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

	public static function visitorsAnalytics()
    {
        return static::selectRaw('count(id) as total_visitors')
            ->selectRaw('city, lat, lon')
            ->whereBetween('created_at', [now()->startOfMonth(), now()->endOfMonth()])
            ->groupBy('city')
            ->orderby('total_visitors', "desc")
            ->limit(4)
            ->get();
    }

    public static function totalVisitorPercentage($totalVisitor)
    {
        return round($totalVisitor / self::count() * 100);
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
