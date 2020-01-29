<?php

namespace App\Http\Report;

use App\Product;

class StockReport extends Report
{
    protected function view()
    {
        return 'admin.report.stock.index';
    }

    protected function query()
    {
        return Product::select('id', 'name', 'qty', 'in_stock')
            ->when(request('stock_availability') === 'in_stock', function ($query) {
                $query->where('in_stock', true);
            })
            ->when(request('stock_availability') === 'out_of_stock', function ($query) {
                $query->where('in_stock', false);
            });
    }
}
