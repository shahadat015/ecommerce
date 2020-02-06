<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class CheckoutController extends Controller
{
    public function index()
    {
        return view('website.checkout.checkout');
    }

    public function store(Request $request)
    {
    	$request->validate([
    		'name' => 'required|string|max:60',
    		'email' => 'required|email|max:60',
    	]);

        $create = Order::create($request->all());

        if($create){
        	return response()->json(['success' => 'Checkout Successful!']);
        }else{
        	return response()->json(['success' => 'Checking Failed! Please try again']);
        }
    }
}
