<?php

namespace App\Http\Controllers\Customer;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class AccountController extends Controller
{
    public function index()
    {
    	$customer = auth()->user();
    	return view('website.customer.account', compact('customer'));    
    }

    public function update(Request $request)
    {
    	$customer = auth()->user();

    	$request->validate([
            'name' => 'required|string|max:60',
            'email' => 'required|email|max:255|unique:customers,email,'.$customer->id,
            'phone' => 'nullable|string|max:30',
            'password' => 'nullable|string|min:8|confirmed'
        ]);

    	if($request->password){
    		$request['password'] = bcrypt($request->password);
    	}else{
    		$request['password'] = $customer->password;
    	}

    	$update = $customer->update($request->all());

    	if($update){
    		return response()->json(['success' => 'Account successfully updated']);
    	}else{
    		return response()->json(['success' => 'Account updating failed']);
    	}

    }
}
