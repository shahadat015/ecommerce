<?php

namespace App\Http\Report;

use App\Coupon;

class CouponsReport extends Report
{
    protected $date = 'orders.created_at';

    protected function view()
    {
        return 'admin.report.coupon.index';
    }

    protected function query()
    {
        return Coupon::select('coupons.id', 'name', 'code')
            ->join('orders', 'coupons.id', '=', 'orders.coupon_id')
            ->selectRaw('MIN(orders.created_at) as start_date')
            ->selectRaw('MAX(orders.created_at) as end_date')
            ->selectRaw('COUNT(*) as total_orders')
            ->selectRaw('SUM(orders.discount) as total')
            ->when(request()->has('coupon_code'), function ($query) {
                $query->where('code', request('coupon_code'));
            })
            ->groupBy(['coupons.id', 'coupons.code']);
    }
}
