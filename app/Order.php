<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;

class Order extends Model
{
    protected $guarded = [];

    public function products()
    {
        return $this->hasMany(OrderProduct::class);
    }

    public function coupon()
    {
        return $this->belongsTo(Coupon::class);
    }

    public function transaction()
    {
        return $this->hasOne(Transaction::class);
    }

    public static function salesAnalytics()
    {
        return static::selectRaw('SUM(total) as total')
            ->selectRaw('COUNT(*) as total_orders')
            ->whereBetween('created_at', [now()->startOfWeek(), now()->endOfWeek()])
            ->selectRaw('EXTRACT(DAY FROM created_at) as day')
            ->groupBy(DB::raw('EXTRACT(DAY FROM created_at)'))
            ->orderby('day')
            ->get();
    }

    public static function totalSales()
    {
        return self::sum('total');
    }

    public static function laratablesCreatedAt($order)
    {
        return $order->created_at->diffForHumans();
    }

    public static function laratablesTotal($order)
    {
            return 'TK ' . $order->total;
    }

    public static function laratablesStatus($order)
    {
            return '<span class="badge badge-soft-primary">'. $order->status .'</span>';
    }

    public static function laratablesCustomAction($action)
    {
        return view('layouts.partials.actions')->with(['edit' => false, 'action' => $action, 'route' => $action->getTable()])->render();
    }
}
