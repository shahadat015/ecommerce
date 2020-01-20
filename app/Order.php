<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

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
