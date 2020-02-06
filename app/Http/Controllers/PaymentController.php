<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class PaymentController extends Controller
{
    public function index()
    {
        return view('website.checkout.payment');
    }

    public function store(Request $request)
    {
    	$request->validate([
    		
    	]);

        $create = Order::create($request->all());

        if($create){
        	return response()->json(['success' => 'Payment Successful!']);
        }else{
        	return response()->json(['success' => 'Payment Failed! Please try again']);
        }
    }
}
