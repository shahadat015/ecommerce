<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Coupon extends Model
{
	protected $fillable = ['name', 'code', 'value', 'is_percent', 'free_shipping', 'minimum_spend', 'maximum_spend', 'usage_limit_per_coupon', 'usage_limit_per_customer', 'used', 'is_active', 'start_date', 'end_date'];

    public static function laratablesIsActive($coupon)
    {
        if ($coupon->is_active) {
            return '<span class="badge badge-soft-info">Active</span>';
        }else{
            return '<span class="badge badge-soft-warning">Inactive</span>';
        }
    }

    public static function laratablesCustomAction($action)
    {
        return view('layouts.partials.actions')->with(['view' => false, 'action' => $action, 'route' => $action->getTable()])->render();
    }
}
