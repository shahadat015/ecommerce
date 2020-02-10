<?php

namespace App\Http\Controllers\Customer;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class FavoriteController extends Controller
{
    public function index()
    {
    	$favorites = auth()->user()->wishlist()->paginate(10);
    	return view('website.customer.favorite', compact('favorites'));    
    }

    public function store($id)
    {
    	$customer = auth()->user();

        if($customer->wishlist->contains($id)){
            return response()->json(['success' => 'Product has already your favorite list']);
        }

        $customer->wishlist()->attach($id);
        return response()->json(['success' => 'Product added to your favorite list']);
    }

    public function destroy($id)
    {
        $customer = auth()->user();

        if($customer->wishlist->contains($id)){
            $customer->wishlist()->detach($id);
            return response()->json(['success' => 'Product removed from your favorite list']);
        }

        return response()->json(['success' => 'Product has not in your favorite list']);
    }
}
