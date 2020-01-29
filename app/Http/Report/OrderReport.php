<?php

namespace App\Http\Report;

use App\Order;

class OrderReport extends Report
{
    protected $date = 'orders.created_at';
    
    protected function view()
    {
        return 'admin.report.order.index';
    }

    protected function query()
    {
        return Order::select('customer_id', 'customer_name', 'customer_email')
            ->selectRaw('MIN(orders.created_at) as start_date')
            ->selectRaw('MAX(orders.created_at) as end_date')
            ->selectRaw('COUNT(*) as total_orders')
            ->join('order_products', 'orders.id', '=', 'order_products.order_id')
            ->selectRaw('SUM(order_products.qty) as total_products')
            ->selectRaw('SUM(orders.total) as total')
            ->when(request()->has('customer_name'), function ($query) {
                $query->where('customer_name', 'like', request('customer_name') . '%');
            })
            ->when(request()->has('customer_email'), function ($query) {
                $query->where('customer_email', request('customer_email'));
            })
            ->groupBy([
                'orders.id',
                'customer_id',
                'customer_name',
                'customer_name',
                'customer_email',
            ]);
    }
}
