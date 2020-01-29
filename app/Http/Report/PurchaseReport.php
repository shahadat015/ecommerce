<?php

namespace App\Http\Report;

use App\Product;

class PurchaseReport extends Report
{
    protected $date = 'orders.created_at';

    protected function view()
    {
        return 'admin.report.purchase.index';
    }

    protected function query()
    {
        return Product::withoutGlobalScope('active')
            ->select('products.id', 'name')
            ->join('order_products', 'products.id', '=', 'order_products.product_id')
            ->selectRaw('SUM(order_products.qty) as qty')
            ->selectRaw('SUM(order_products.line_total) as total')
            ->join('orders', 'order_products.order_id', '=', 'orders.id')
            ->selectRaw('MIN(orders.created_at) as start_date')
            ->selectRaw('MAX(orders.created_at) as end_date')
            ->when(request()->has('product'), function ($query) {
                $query->where('name', 'like', request('product') . '%');
            })
            ->when(request()->has('sku'), function ($query) {
                $query->where('sku', request('sku'));
            })
            ->groupBy('products.id');
    }
}
