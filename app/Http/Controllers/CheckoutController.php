<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests\CheckoutValidate;
use App\Customer;
use App\Order;
use Cart;

class CheckoutController extends Controller
{
    public function index()
    {
        if(!Cart::count()) return redirect('cart');
        return view('website.checkout.checkout');
    }

    public function store(CheckoutValidate $request)
    {
        $request->merge([
            'shipping' => $request->ship_to_a_different_address ? $request->shipping : $request->billing,
        ]);

        if(auth('customer')->guest() && $request->create_account){
            $customer = $this->customerRegister($request);
            auth()->guard('customer')->login($customer);
        }

        $order = $this->createOrder($request);

        if($order){
            session()->put('order', $order);
        	return redirect('payment');
        }else{
        	return back()->with(['error' => 'Checking out Failed! Please try again']);
        }
    }

    protected function createOrder($request){
        $order = Order::create([
            'customer_id' => auth('customer')->id(),
            'customer_email' => $request->email,
            'customer_phone' => $request->billing['phone'],
            'customer_name' => $request->billing['name'],
            'billing_name' => $request->billing['name'],
            'billing_phone' => $request->billing['name'],
            'billing_address' => $request->billing['address'],
            'billing_city' => $request->billing['city'],
            'billing_zip' => $request->billing['zip_code'],
            'billing_country' => $request->billing['country'],
            'shipping_name' =>  $request->shipping['name'],
            'shipping_phone' => $request->shipping['phone'],
            'shipping_address' => $request->shipping['address'],
            'shipping_city' => $request->shipping['city'],
            'shipping_zip' => $request->shipping['zip_code'],
            'shipping_country' => $request->shipping['country'],
            'sub_total' => Cart::subtotal(),
            'shipping_method' => $request->shipping_method,
            'shipping_cost' => $request->shipping_cost,
            'coupon_id' => NULL,
            'discount' => NULL,
            'total' => Cart::total() + $request->shipping_cost,
            'payment_method' => NULL,
            'status' => 'pending',
        ]);

        $this->storeOrderProducts($order);

        return $order;
    }

    private function storeOrderProducts($order)
    {
        Cart::content()->each(function ($cartItem) use ($order) {
            $order->storeProducts($cartItem);
        });
    }

    protected function customerRegister($request)
    {
        $customer = Customer::firstOrNew([ 'email' => $request->email  ]);

        if($customer->exists) return $customer;

        $customer->fill([
            'name' => $request->billing['name'],
            'phone' => $request->billing['phone'],
            'address' => $request->shipping['address'],
            'password' => bcrypt($request->password),
        ])->save();

        return $customer;
    }
}
