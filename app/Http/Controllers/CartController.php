<?php

namespace App\Http\Controllers;

use App\Coupon;
use App\Option;
use App\Product;
use Cart;
use Illuminate\Http\Request;

class CartController extends Controller
{
	public function index()
    {
    	return view('website.cart.index');
    }

    public function store(Product $product, Request $request)
    {
        $options = array_filter($request->options ?? []);

    	$added = Cart::add([
			'id' => $product->id, 
			'name' => $product->name, 
			'price' => $product->getSellingPrice(),
			'qty' => $request->qty ?: 1,
			'weight' => 0,
			'options' => [
				'image' => $product->image,
				'options' => $this->options($product, $options)
			]
    	]);

    	if($added){
    		return response()->json(['success' => 'Product added to your cart!']);
    	}else{
    		return response()->json(['success' => 'Adding failed to cart!']);
    	}
    }

    private function options($product, $options)
    {
        return $product->options()
            ->with(['values' => function ($query) use ($options) {
                $query->whereIn('id', array_flatten($options));
            }])->get();
    }

    public function update($rowId, Request $request)
    {
    	$update = Cart::update($rowId, $request->qty);
    	if($update){
    		return response()->json(['success' => 'Cart successfuly updated!']);
    	}else{
    		return response()->json(['success' => 'Cart updating failed!']);
    	}
    }

    public function destroy($rowId)
    {
    	Cart::remove($rowId);
    	return response()->json(['success' => 'Product removed to your cart!']);
    }

    public function itemCount()
    {
    	return '<p>Cart-<span>Tk ' .  Cart::total()  . '</span></p>
                <span class="cart_bag"><i class="fas fa-shopping-bag"></i></span>
                <h6> '.  Cart::content()->count() .'</h6>';
    }

    public function miniCart()
    {
    	return view('website.cart.mini-cart');
    }
    
    public function cartContent()
    {
        return view('website.cart.cart-content');
    }

    public function coupon(Request $request)
    {
        $request->validate([
            'coupon' => 'required|string|max:60'
        ]);


        $coupon = Coupon::whereCode($request->coupon)->whereIsActive(1)->first();

        if(!$coupon){
            return response()->json(['error' => 'Coupon is invalid']);
        }

        if($coupon->invalid()){
            return response()->json(['error' => 'Coupon was expeired']);
        }

        if ($coupon->usageLimitReached()) {
            return response()->json(['error' => 'Coupon maximum use reached']);
        }

        if ($coupon->minimumSpend()) {
            return response()->json(['error' => "Purchase minimum Tk $coupon->minimum_spend"]);
        }

        if ($coupon->maximumSpend()) {
            return response()->json(['error' => "Maximum purchase limit Tk $coupon->maximum_spend"]);
        }

        if(!session()->get('coupon')){
            session()->put('coupon', $coupon);
            return response()->json(['success' => 'Coupon successfully applied']);
        }else{
            return response()->json(['error' => 'Coupon already applied']);
        }

    }

}
