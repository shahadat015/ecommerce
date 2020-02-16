<?php

namespace App;

use App\Http\Traits\ActivityLog;
use Illuminate\Database\Eloquent\Model;
use Cart;

class Coupon extends Model
{
    use ActivityLog;
    
	protected $fillable = ['name', 'code', 'value', 'is_percent', 'free_shipping', 'minimum_spend', 'maximum_spend', 'usage_limit_per_coupon', 'usage_limit_per_customer', 'used', 'is_active', 'start_date', 'end_date'];

	public function products()
    {
        return $this->belongsToMany(Product::class, 'coupon_products');
    }

    public function categories()
    {
        return $this->belongsToMany(Category::class, 'coupon_categories');
    }

    public function valid()
    {
        if ($this->hasStartDate() && $this->hasEndDate()) {
            return $this->startDateIsValid() && $this->endDateIsValid();
        }

        if ($this->hasStartDate()) {
            return $this->startDateIsValid();
        }

        if ($this->hasEndDate()) {
            return $this->endDateIsValid();
        }

        return true;
    }

    public function invalid()
    {
        return ! $this->valid();
    }

    private function hasStartDate()
    {
        return ! is_null($this->start_date);
    }

    private function hasEndDate()
    {
        return ! is_null($this->end_date);
    }

    private function startDateIsValid()
    {
        return today() >= $this->start_date;
    }

    private function endDateIsValid()
    {
        return today() <= $this->end_date;
    }

    public function usageLimitReached()
    {
        return $this->perCouponUsageLimitReached() || $this->perCustomerUsageLimitReached();
    }

    public function perCouponUsageLimitReached()
    {
        if (is_null($this->usage_limit_per_coupon)) {
            return false;
        }

        return $this->used >= $this->usage_limit_per_coupon;
    }

    public function perCustomerUsageLimitReached()
    {
        if (is_null($this->usage_limit_per_customer) || auth('customer')->guest()) {
            return false;
        }

        $used = $this->orders()
            ->where('customer_email', auth('customer')->user()->email)
            ->count();

        return $used >= $this->usage_limit_per_customer;
    }

    public function orders()
    {
        return $this->hasMany(Order::class);
    }

    public function customers()
    {
        return $this->hasManyThrough(
            Customer::class,
            Order::class,
            'coupon_id',
            'id',
            'id',
            'customer_id'
        );
    }

    public function minimumSpend()
    {
        if (! is_null($this->minimum_spend)) {
            return $this->minimum_spend > Cart::subtotal();
        }
    }

    public function maximumSpend()
    {
        if (! is_null($this->maximum_spend)) {
            return $this->maximum_spend < Cart::subtotal();
        }
    }

    public function value()
    {
        if ($this->is_percent) {
            return Cart::subtotal() * $this->value / 100;
        }else{
            return $this->value;
        }
    }

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
