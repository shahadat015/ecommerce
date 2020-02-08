<?php

namespace App\Http\Controllers\Customer;

use App\Http\Controllers\Controller;
use App\Product;
use Illuminate\Http\Request;

class CustomerController extends Controller
{
    public function index()
    {
    	$orders = auth()->user()->orders;
    	return view('website.customer.dashboard', compact('orders'));    
    }

    public function orders()
    {
    	$orders = auth()->user()->orders;
    	return view('website.customer.order', compact('orders'));    
    }

    public function account()
    {
    	$customer = auth()->user();
    	return view('website.customer.account', compact('customer'));    
    }

    public function updateAccount(Request $request)
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

    public function favorite()
    {
    	$favorites = auth()->user()->wishlist()->paginate(10);
    	return view('website.customer.favorite', compact('favorites'));    
    }

    public function storeFavorite($id)
    {
    	$customer = auth()->user();

        if($customer->wishlist->contains($id)){
            return response()->json(['success' => 'Product has already your favorite list']);
        }

        $customer->wishlist()->attach($id);
        return response()->json(['success' => 'Product added to your favorite list']);
    }

    public function removeFavorite($id)
    {
        $customer = auth()->user();

        if($customer->wishlist->contains($id)){
            $customer->wishlist()->detach($id);
            return response()->json(['success' => 'Product removed from your favorite list']);
        }

        return response()->json(['success' => 'Product has not in your favorite list']);
    }
}
