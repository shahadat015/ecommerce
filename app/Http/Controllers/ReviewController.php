<?php

namespace App\Http\Controllers;

use App\Product;
use App\Review;
use Illuminate\Http\Request;

class ReviewController extends Controller
{
    public function store(Product $product, Request $request)
    {
    	$request->validate([
            'reviewer_name' => 'required|string|max:60',
    		'comment' => 'required|string',
    	]);

        $request['customer_id'] = auth()->id();
        $request['product_id'] = $product->id;

        $create = Review::create($request->all());

        if($create){
        	return response()->json(['success' => 'Thanks for your review!']);
        }else{
        	return response()->json(['success' => 'Ops! Please try again!']);
        }
    }
}
