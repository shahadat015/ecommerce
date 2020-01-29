<?php

namespace App\Http\Report;

use App\Order;

class ShippingReport extends Report
{
    protected function view()
    {
        return 'admin.report.shipping.index';
    }

    protected function data()
    {
        return [];
    }

    public function query()
    {
        return Order::select('shipping_method')
            ->selectRaw('MIN(created_at) as start_date')
            ->selectRaw('MAX(created_at) as end_date')
            ->selectRaw('COUNT(*) as total_orders')
            ->selectRaw('SUM(shipping_cost) as total')
            ->when(request()->has('shipping_method'), function ($query) {
                $query->where('shipping_method', request('shipping_method'));
            })
            ->groupBy('shipping_method');
    }
}
