<?php

namespace App\Http\Controllers\Customer;

use App\Http\Controllers\Controller;
use App\Product;
use App\Order;
use Illuminate\Http\Request;

class OrderController extends Controller
{

    public function index()
    {
    	$orders = auth()->user()->orders()->paginate(10);
    	return view('website.customer.order', compact('orders'));    
    }

    public function show(Order $order)
    {
        return view('website.customer.show', compact('order'));    
    }

}
