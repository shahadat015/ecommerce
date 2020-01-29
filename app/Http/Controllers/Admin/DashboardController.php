<?php

namespace App\Http\Controllers\Admin;

use App\Customer;
use App\Http\Controllers\Controller;
use App\Order;
use App\Product;
use App\Review;
use App\Visitor;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class DashboardController extends Controller
{
    public function index()
    {
    	return view('admin.dashboard.index', [
            'totalSales' => Order::totalSales(),
            'totalOrders' => Order::count(),
            'totalProducts' => Product::count(),
            'totalCustomers' => Customer::count(),
            'latestOrders' => $this->getLatestOrders(),
            'topVisitorsAreas' => $this->visitorsAnalytics(),
        ]);
    }

    public function salesAnalytics()
    {
    	return response()->json(Order::salesAnalytics());
    }

    public function visitorsAnalytics()
    {
    	return Visitor::visitorsAnalytics();
    }

    private function getLatestOrders()
    {
        return Order::select(['id','customer_name','total','status','created_at'])->latest()->take(5)->get();
    }

    private function getLatestReviews()
    {
        return Review::select('id', 'product_id', 'reviewer_name', 'rating')->with('product:id')->get();
    }
}
