<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Report\CouponsReport;
use App\Http\Report\OrderReport;
use App\Http\Report\PurchaseReport;
use App\Http\Report\SalesReport;
use App\Http\Report\ShippingReport;
use App\Http\Report\StockReport;
use Illuminate\Http\Request;

class ReportController extends Controller
{
    private $reports = [
        'coupons_report' => CouponsReport::class,
        'order_report' => OrderReport::class,
        'purchase_report' => PurchaseReport::class,
        'stock_report' => StockReport::class,
        'sales_report' => SalesReport::class,
        'shipping_report' => ShippingReport::class,
    ];

    public function index(Request $request)
    {
        $type = $request->query('type');

        if (! $this->reportTypeExists($type)) {
            return redirect()->route('admin.reports', ['type' => 'coupons_report']);
        }

        return $this->report($type)->render($request);
    }

    private function reportTypeExists($type)
    {
        return array_key_exists($type, $this->reports);
    }

    private function report($type)
    {
        return new $this->reports[$type];
    }
}
