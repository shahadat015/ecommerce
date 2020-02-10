<?php

namespace App\Http\Controllers\Customer;

use App\Http\Controllers\Controller;
use App\Product;
use App\Order;
use Illuminate\Http\Request;

class DashboardController extends Controller
{
    public function index()
    {
    	$orders = auth()->user()->orders;
    	return view('website.customer.dashboard', compact('orders'));    
    }
}
